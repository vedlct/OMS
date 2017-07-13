<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    public function get(){

        $id=session('user-id');

        $profile_info= DB::table('customer_info')
                            ->where('user_id',$id)
                            ->limit(1)
                            ->get();
        return $profile_info;

    }
    public function newjobrequest(){

//        $jobrequest= DB::table('job_request')
//            ->where('job_status','Pending')
//            ->get();
        $jobrequest=DB::table('job_request')

                            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
                            ->where('job_status','Pending')
                            ->get();

        return $jobrequest;
    }

    public function change_job_status($id,$value){

        DB::table('job_request')
            ->where('job_id',$id)
            ->update(array('job_status'=>$value));
    }
}
