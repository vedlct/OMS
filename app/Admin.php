<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public function get(){

        $id=session('user-id');

        $profile_info= DB::table('customer_info')->where('user_id',$id)->limit(1)->get();
        return $profile_info;

    }
}
