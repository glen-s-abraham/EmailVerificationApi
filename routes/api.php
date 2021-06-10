<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('user','User\UserController')->only(['store']);

Route::get('email/verify/{id}','verification\VerificationController@verify')->name('verification.verify');

Route::get('email/resend','verification\VerificationController@resend')->name('verification.resend');;