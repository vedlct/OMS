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


Route::get('/Admin_profile', 'AdminController@profile')->name('adminprofile');
Route::get('/User_profile', 'UserController@profile')->name('userprofile');


Route::get('/NewJobRequest', 'AdminController@newjobrequest')->name('adminnewjobrequest');
Route::get('/deletejobreq/{id}','AdminController@jobreqdelete');
Route::get('/NewJobRequest_user', 'UserController@newjobrequest')->name('usernewjobrequest');


Route::post('/insertnewjob', 'UserController@insertnewjob')->name('insertjobuser');



Route::get('/changejobstatus/{id}','AdminController@changejobstatus');

Route::get('/NewUserRequest', 'AdminController@newuserrequest')->name('newuserrequest');
Route::get('/changeuserstatus/{id}','AdminController@changeuserstatus');

Route::get('/JobOnGoing', 'AdminController@ongoingjob')->name('ongoingjob');
Route::get('/FinshedJob', 'AdminController@finshedjob')->name('finshedjob');


Route::get('/JobOnGoing_User', 'UserController@ongoingjob')->name('ongoingjob_user');
Route::get('/FinshedJob_User', 'UserController@finshedjob')->name('finshedjob_user');
Route::get('/PendingJob_User', 'UserController@pendingjob')->name('pendingjob_user');

Route::get('/changejob_user/{id}', 'UserController@changependingjob');
Route::post('/updatejob', 'UserController@updatejob');


Route::get('/ClientInfo', 'AdminController@viewclient')->name('clintinfo');
Route::get('/ClientInfo/{id}','AdminController@clientinfo');
Route::post('/ClientInfo', 'AdminController@updateclientinfo')->name('updateinfo');


Route::get('/Service', 'AdminController@serviceinfo');
Route::post('/Service', 'AdminController@insertservice')->name('insertservice');
Route::get('/changeservicestatus/{id}','AdminController@changeservicestatus');
Route::get('/deleteservice/{id}','AdminController@servicedelete');


Route::get('/PasswordChange', 'AdminController@passchange')->name('passchange');
Route::get('/changepassword/{id}','AdminController@changeuserpass');
Route::post('/passchange/{id}','AdminController@changepass');


Route::get('/message', 'MessageController@showAdminsms');


