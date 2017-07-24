<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;

class Login extends Model
{
    public function validate($username,$password){

        $logpass=md5($password);



        $user = DB::table('customer_info')
            ->where('username', $username)
            ->where('password', $logpass)
            ->get();

        return $user;
    }
    public function log(){

        date_default_timezone_set("Asia/Dhaka");
        $logtime =Carbon::now();
        $ip = \Request::ip();
        DB::insert('insert into log_info (company_name,login_details,login_ip,login_status) values (?,?,?,?)', [session('order'),$logtime,$ip,1]);

    }
    public function logout(){

        date_default_timezone_set("Asia/Dhaka");
        $logtime =Carbon::now();
        $c_name=session('order');

        DB::table('log_info')
            ->where('company_name',$c_name)
            ->where('login_status','1')
            ->update(array('logout_details'=>$logtime,'login_status'=>'0'));
    }
}
