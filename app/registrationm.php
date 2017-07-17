<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class registrationm extends Model
{
    //
    protected $table = 'customer_info';

    public function insertdata($loginname,$pass,$clientname,$contact,$number,$email,$address,$web){

        $data =array(
            'username' => $loginname,
            'password' => $pass,
            'user_type' => '',
            'company_name' => $clientname,
            'short_name' => $number,
            'contact_person' => $contact,
            'contact_no' => $number,
            'email' => $email,
            'address' => $address,
            'webaddress' => $web,
            'client_status' => 'pending',

        );
        DB::table('customer_info')->insert($data);
    }
}
