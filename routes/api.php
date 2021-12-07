<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('transactions', [TransactionController::class, 'create']);
    Route::patch('transactions/operations/{transactionId}/observation', [TransactionController::class, "updateProofOfObservation"]);
    Route::patch('transactions/operations/{transactionId}/cleanup', [TransactionController::class, "updateProofOfCleanup"]);
    Route::get('transactions/{transactionid}/details', [TransactionController::class, 'getTransactionDetail']);
    Route::get('transactions/{userId}', [TransactionController::class, 'getTransactions']);
});
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
