<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    static function getLeastBusyDriver()
    {
        if (transactions::count() == 0) {
            return User::where('roles', '=', 'DRIVER')->first();
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
                return $joblessDrivers->first();
            }
        }
    }

    function getTransactions(Request $request)
    {
        $user = Auth::user();
        if ($user->roles == "DRIVER") {
            $driverTransactions = transactions::where('driver_id', '=', $user->id)
                ->where('status', '=', 'PENDING')->get();
            return ResponseFormatter::success(
                $driverTransactions,
                "Driver transactions"
            );
        } else {
            $userTransactions = transactions::where('reporter_id', '=', $user->id)->orderBy('id', 'desc')->get();
            return ResponseFormatter::success(
                $userTransactions,
                "User transactions"
            );
        }
    }

    function getTransactionDetail(int $transactionId)
    {
        $foundTransaction = transactions::where("id", '=', $transactionId)->get();
        if ($foundTransaction->count() == 0) {
            return ResponseFormatter::error(
                null,
                ["No transaction with id $transactionId is found."],
                404
            );
        } else {
            return ResponseFormatter::success(
                $foundTransaction,
                "Transaction $transactionId details"
            );
        }
    }

    function updateProofOfObservation(int $transactionId, Request $request)
    {
        $foundTransaction = transactions::where('id', '=', $transactionId);
        if ($foundTransaction->count() > 0 && $foundTransaction->first()->status == "PENDING") {
            $file = $request->file("observation_img");
            $now = date('m/d/Y h:i:s a', time());
            $out = substr(hash('md5', $now), 0, 12);
            $newFilename = $out . "." . $file->getClientOriginalExtension();
            $folder = '/uploads';
            $file->storeAs($folder, $newFilename, 'public');
            transactions::where('id', '=', $transactionId)
                ->update([
                    'status' => "DITINJAU",
                    'picked_image' => $newFilename
                ]);
            return ResponseFormatter::success(null, "Proof of observation updated");
        } else {
            return ResponseFormatter::error(null, "Either there is no transaction with id $transactionId or the transaction is not in pending state");
        }
    }

    function updateProofOfCleanup(int $transactionId, Request $request)
    {
        $foundTransaction = transactions::where('id', '=', $transactionId);
        if ($foundTransaction->count() > 0 && $foundTransaction->first()->status == "DITINJAU") {
            $file = $request->file("cleanup_img");
            $now = date('m/d/Y h:i:s a', time());
            $out = substr(hash('md5', $now), 0, 12);
            $newFilename = $out . "." . $file->getClientOriginalExtension();
            $folder = '/uploads';
            $file->storeAs($folder, $newFilename, 'public');
            transactions::where('id', '=', $transactionId)
                ->update([
                    'status' => "DIJEMPUT",
                    'finished_image' => $newFilename
                ]);
            return ResponseFormatter::success(null, "Proof of cleanup updated");
        } else {
            return ResponseFormatter::error(null, "Either there is no transaction with id $transactionId or the transaction is not in observed state");
        }
    }

    function create(Request $request)
    {
        try {
            $user = Auth::user();
            if ($user->roles != "DRIVER") {
                $file = $request->file('report_img');
                $now = date('m/d/Y h:i:s a', time());
                $out = substr(hash('md5', $now), 0, 12);
                $newFilename = $out . "." . $file->getClientOriginalExtension();
                $folder = '/uploads';
                $file->storeAs($folder, $newFilename, 'public');
                $reporterId = $user->id;
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
            } else {
                return ResponseFormatter::error(null, "Driver cannot create transactions.");
            }
        } catch (Exception $err) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $err
            ], 'Server Error', 500);
        }
    }

    function pickupCount()
    {
        $count = transactions::where('status', '=', 'DIJEMPUT')->count();
        return ResponseFormatter::success(
            [
                "count" => $count
            ],
            "Number of Transactions"
        );
    }
}
