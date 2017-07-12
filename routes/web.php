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
    return view('login');
});

Route::get('/AdminHome', function () {
    return view('admin.Home');
});

Route::get('/UserHome', function () {
    return view('user.Home');
});


Route::post('/logincheck','LoginController@validate_user');
