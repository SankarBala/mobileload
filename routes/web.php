<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicPageController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Client\ClientPageController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\Recharge;
use smasif\ShurjopayLaravelPackage\ShurjopayService;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('mail', function () {
    Mail::to('sankarbala232@gmail.com')->send(new App\Mail\TestMail());
});

Route::get('notify', function () {
    $user = User::find(1);
    // $user->notify((new TestNotification())->delay(now()->addSeconds(10)));

    // dd($user->notifications->count());
    // dd($user->readNotifications->count());
    dd($user->unReadNotifications);

    // Notification::send($user, new TestNotification());

});



Route::get('/packages', function () {

    $response = file_get_contents(
        'http://bdsmartpay.com/sms/operatorplans.php',
        false,
        stream_context_create(
            [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'GET'
                ]
            ]
        )
    );

    return json_decode($response);

})->name('packages');


Route::post('/recharge', [RechargeController::class, 'topUp'])->name('recharge');
Route::get('/payment',  [PaymentController::class, 'spresponse'])->name('payment');

Route::post('/change-photo',  [ProfileController::class, 'changePhoto'])->name('changePhoto');
Route::post('/client-recharge',  [ProfileController::class, 'recharge'])->name('clientRecharge');
Route::get('/client-recharge-response',  [ProfileController::class, 'rechargeResponse'])->name('clientRechargeResponse');



Route::get('/', [BasicPageController::class, 'home'])->name('home');
Route::get('/about-us', [BasicPageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [BasicPageController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-of-use', [BasicPageController::class, 'termsOfUse'])->name('termsOfUse');
Route::get('/faq', [BasicPageController::class, 'faq'])->name('faq');
Route::get('/support', [BasicPageController::class, 'support'])->name('support');
Route::get('/privacy-policy', [BasicPageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::fallback([BasicPageController::class, 'fallback'])->name('fallback');


Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin'],
        'as' => 'admin.'
    ],
    function () {
        Route::get('/', [AdminPageController::class, 'home'])->name('home');
    }
);


Route::group(
    [
        'prefix' => 'client',
        'middleware' => ['auth', 'client'],
        'as' => 'client.'
    ],
    function () {
        Route::get('/', [ClientPageController::class, 'home'])->name('home');
        Route::get('/mobile-recharge', [ClientPageController::class, 'mobile_recharge'])->name('mobile_recharge');
        Route::post('/recharge', [ClientPageController::class, 'recharge'])->name('recharge');
        Route::get('/bulk-sms', [ClientPageController::class, 'sms'])->name('sms');
        Route::get('/profile', [ClientPageController::class, 'profile'])->name('profile');
        Route::get('/setting', [ClientPageController::class, 'setting'])->name('setting');
    }
);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
