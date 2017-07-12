<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    public function validate($username,$password){

        $user = DB::table('customer_info')
            ->where('username', $username)
            ->where('password', $password)
            ->get();
        return $user;
    }
}
