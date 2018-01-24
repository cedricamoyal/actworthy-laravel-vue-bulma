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

Route::get('/', function () {
    return view('main');
});
Route::get('current_guests', 'GuestController@index');
Route::post('create_guest', 'GuestController@store');
Route::post('delete_guest/{id}', 'GuestController@destroy');
