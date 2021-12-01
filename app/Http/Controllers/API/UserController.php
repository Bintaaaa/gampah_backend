<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
