<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicPageController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Client\ClientPageController;

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
Route::get('/ui', function(){
    return view('home');
})->middleware('auth');

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
        'middleware' => 'admin',
        'as' => 'admin.'
    ],
    function () {
        Route::get('/', [AdminPageController::class, 'home'])->name('home');
    }
);


Route::group(
    [
        'prefix' => 'client',
        'middleware' => 'client',
        'as' => 'client.'
    ],
    function () {
        Route::get('/', [ClientPageController::class, 'home'])->name('home');
    }
);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
