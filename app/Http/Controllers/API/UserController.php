<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate(
                [
                    'email' => 'email|required',
                    'password' => 'required'
                ]
            );
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error(['message' => 'Unauthorized'], 'Authentication Failed', 500);
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success(['access_token' => $tokenResult, 'token_type' => 'Bearer', 'user' => $user], 'Authenticated');
        } catch (\Throwable $th) {
            return ResponseFormatter::error(['message' => 'Something went wrong', 'error' => $th], 'Authentication failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'token Revoked');
    }

    public function register(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => ['required', 'string', 'max:35'],
                    'email' => ['email', 'required'],
                    'phone' => ['required', 'string', 'max:13'],
                    'roles' => ['required', 'string'],
                    'password' => ['string', 'required', new Password],
                ]
            );

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'roles' => $request->roles,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Success to Register');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authenticated Failed', 500);
        }
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $carbon =  Carbon::now();
        $user->update([
            'last_active' => $carbon->toDateTimeString()
        ]);
        return ResponseFormatter::success($request->user(), 'Success to get data user');
    }

    public function contributors()
    {
        $count = User::count();
        return ResponseFormatter::success(
            [
                "count" => $count
            ],
            "Number of contributors"
        );
    }

    public function drivers()
    {
        $count = User::where('roles', '=', 'DRIVER')->count();
        return ResponseFormatter::success(
            [
                "count" => $count
            ],
            "Number of drivers"
        );
    }
}
