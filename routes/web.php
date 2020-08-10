<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/password', 'PasswordController@index')->name('password');

Route::post('/changePassword','PasswordController@changePassword')->name('changePassword');

Route::get('/Admin', 'AdminController@index')->name('Admin')->middleware('admin');

Route::group([ 'middeleware' => ['auth']], function() {

    Route::resource('tenant', 'LocataireController');

    Route::resource('admin', 'AdminController');

    Route::resource('house', 'BienController');

    Route::resource('rental', 'LocationController');

    Route::resource('payment', 'PaymentController');

    Route::resource('state', 'EtatController');

    Route::resource('user', 'UsersController');


});
