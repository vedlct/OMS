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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('login');
});

Route::get('/Home', function () {
    return view('Home');
});

Route::post('/logincheck','LoginController@validate_user');
//Route::get('/Home','LoginController@home');
Route::get('/Logout','LoginController@logout');


Route::get('/profile', 'AdminController@profile')->name('adminprofile');
//Route::get('/profile', 'UserController@profile')->name('userprofile');

