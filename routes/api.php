<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OTPController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/otp', [OTPController::class,  'generator'])->name('otp.generator');
Route::post('/otp-verify', [OTPController::class,  'verify'])->name('otp.verifier');
Route::post('/change-password', [OTPController::class,  'changePassword'])->name('changePassword');