<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => 'true', 'register' => false]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('permits', 'PermitController');
Route::post('permits/{permit}/occupants', 'PermitController@storeOccupant')->name('occupants.store');
Route::resource('users', 'UserController');
