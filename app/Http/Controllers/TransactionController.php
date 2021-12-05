<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\User;
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

    function getTransactions(int $userId) {
        $user = User::where('id', '=', $userId);
        if ($user->count() == 0) {
            return ResponseFormatter::error(
                null,
                "User with id $userId is not found",
                404
            );
        }
        else {
            $userFirst = $user->first();
            if ($userFirst->roles == "driver") {
                $driverTransactions = transactions::where('driver_id', '=', $userId)
                    ->where('status', '=', 'PENDING');
                return ResponseFormatter::success(
                    $driverTransactions,
                    "Driver transactions"
                );
            }
            else {
                $userTransactions = transactions::where('reporter_id', '=', $userId)->orderBy('id', 'asc');
                return ResponseFormatter::success(
                    $userTransactions,
                    "Driver transactions"
                );
            }
        }
    }

    function create(Request $request)
    {
        $file = $request->file('report_img');
        $now = date('m/d/Y h:i:s a', time());
        $out = substr(hash('md5', $now), 0, 12);
        $newFilename = "uploads/" . $out . "." . $file->getClientOriginalExtension();
        $file->move($newFilename);
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
        return ResponseFormatter::success("Inserted", 'Transaction Created');
    }
}
