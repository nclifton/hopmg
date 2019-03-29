<?php

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

use App\User;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/guestLogin', 'Auth\LoginController@guest')->name('guestLogin');

// use the web route group for this api so that we by default have a session created (the api group is stateless)
Route::post('api/register','Auth\RegisterController@api')->name('register.api');




