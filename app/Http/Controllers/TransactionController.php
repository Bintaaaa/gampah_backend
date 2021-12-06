<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    static function getLeastBusyDriver()
    {
        if (transactions::count() == 0) {
            return User::where('roles', '=', 'driver')->first();
        } else {
            $joblessDrivers = DB::table("users")->select()->whereNotIn('users.id', DB::table("transactions")->select('driver_id'))->where('roles', '=', 'driver')->get();
            if ($joblessDrivers->count() == 0) {
                $leastBusyDriver = DB::table("users")->join('transactions', 'users.id', "=", "transactions.driver_id")
                    ->select('users.id', DB::raw('COUNT(transactions.driver_id) as jobcount'))
                    ->groupBy('users.id')
                    ->orderBy('jobCount', 'asc')
                    ->first();
                return User::where('id', '=', $leastBusyDriver->id)->first();
            } else {
                return $joblessDrivers;
            }
        }
    }

    function getTransactions(int $userId)
    {
        $user = User::where('id', '=', $userId);
        if ($user->count() == 0) {
            return ResponseFormatter::error(
                null,
                "User with id $userId is not found",
                404
            );
        } else {
            $userFirst = $user->first();
            // dd($userFirst);
            if ($userFirst->roles == "driver") {
                $driverTransactions = transactions::where('driver_id', '=', $userId)
                    ->where('status', '=', 'PENDING')->get();
                return ResponseFormatter::success(
                    $driverTransactions,
                    "Driver transactions"
                );
            } else {
                $userTransactions = transactions::where('reporter_id', '=', $userId)->orderBy('id', 'desc')->get();
                return ResponseFormatter::success(
                    $userTransactions,
                    "User transactions"
                );
            }
        }
    }

    function create(Request $request)
    {
        try {
            $file = $request->file('report_img');
            $now = date('m/d/Y h:i:s a', time());
            $out = substr(hash('md5', $now), 0, 12);
            $newFilename = $out . "." . $file->getClientOriginalExtension();
            $folder = '/uploads';
            $file->storeAs($folder, $newFilename, 'public');
            $reporterId = $request->reporter_id;
            $driverId = TransactionController::getLeastBusyDriver()->id;
            $reportImage = $newFilename;
            $addressDetail = $request->address_detail;
            $status = "PENDING";
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            transactions::create([
                'reporter_id' => $reporterId,
                'driver_id' => $driverId,
                'report_image' => $reportImage,
                'address_detail' => $addressDetail,
                'status' => $status,
                'longitude' => $longitude,
                'latitude' => $latitude
            ]);
            $transaction = transactions::where('reporter_id', $reporterId)->first();
            return ResponseFormatter::success(['report' => $transaction], 'Transaction Created');
        } catch (Exception $err) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $err
            ], 'Authenticated Failed', 500);
        }
    }
}
