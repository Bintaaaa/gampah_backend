<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    function getLeastBusyDriver()
    {
        if (transactions::count() == 0) {
            return User::where('roles', '=', 'driver')->first();
        } else {
            $joblessDrivers = DB::table("users")->select()->whereNotIn('users.id', DB::table("transactions")->select('driver_id'))->where('roles', '=', 'driver')->get();
            if ($joblessDrivers->count() == 0) {
                $leastBusyDriverId = DB::table("users")->join('transactions', 'users.id', "=", "transactions.driver_id")
                    ->select('transactions.driver_id', DB::raw('COUNT(transactions.driver_id) as jobcount'))
                    ->groupBy('transactions.driver_id')
                    ->orderBy('jobCount', 'asc')
                    ->first()->driver_id;
                return User::where('id', '=', $leastBusyDriverId)->get();
            } else {
                return $joblessDrivers;
            }
        }
    }
}
