<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class registrationm extends Model
{
    //
    protected $table = 'customer_info';

    public function insertdata($loginname,$pass,$clientname,$contact,$number,$email,$address,$web,$short_name){

        $data =array(
            'username' => $loginname,
            'password' => $pass,
            'user_type' => 'User',
            'company_name' => $clientname,
            'short_name' => $short_name,
            'contact_person' => $contact,
            'contact_no' => $number,
            'email' => $email,
            'address' => $address,
            'webaddress' => $web,
            'client_status' => 'Pending',

        );

        DB::table('customer_info')->insert($data);
    }

    public function user_check($loginname){


        $user= DB::table('customer_info')
            ->where('username',$loginname)
            ->count();
        return $user;
    }
}
