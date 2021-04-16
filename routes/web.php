<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicPageController;

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

Route::get('/', [BasicPageController::class, 'home'])->name('home');
Route::get('/about-us', [BasicPageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [BasicPageController::class, 'contactUs'])->name('contactUs');
Route::get('/terms-of-use', [BasicPageController::class, 'termsOfUse'])->name('termsOfUse');
Route::get('/faq', [BasicPageController::class, 'faq'])->name('faq');
Route::get('/support', [BasicPageController::class, 'support'])->name('support');
Route::get('/privacy-policy', [BasicPageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::fallback([BasicPageController::class, 'fallback'])->name('fallback');


Route::get('/admin', function(){
    return view('admin.index3');
});
