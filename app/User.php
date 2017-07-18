<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
//    use Notifiable;
//
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function get(){

        $id=session('user-id');

        $profile_info= DB::table('customer_info')
            ->where('user_id',$id)
            ->limit(1)
            ->get();
        return $profile_info;

    }

    public function get_active_service(){

        $service= DB::table('service')
            ->where('service_status','Active')
            ->orderBy('service_name', 'ASC')
            ->get();
        return $service;
    }

    public function insertjob($service_type,$instruction){

        $id=session('user-id');

        $data=array(
            'client_id'=>$id,
            'service'=>$service_type,
            'instruction'=>$instruction
        );

        DB::table('job_request')->insert($data);

        return true;

    }

    public function ongoingjob(){

        $id=session('user-id');
        $ongoing=DB::table('job_request')

//            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('client_id',$id)
            ->where('job_status','On Going')
            ->get();

        return $ongoing;
    }

    public function pendingjob(){

        $id=session('user-id');
        $pending=DB::table('job_request')

//            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('client_id',$id)
            ->where('job_status','Pending')
            ->get();

        return $pending;
    }

    public function jobdone(){

        $id=session('user-id');

        $finshedwork=DB::table('job_request')

//            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('client_id',$id)
            ->where('job_status','Done')
            ->get();

        return $finshedwork;
    }

    public function jobinstruction($id){

        //$id=session('user-id');

        $job=DB::table('job_request')

//            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('job_id',$id)
            ->where('job_status','Pending')
            ->limit(1)
            ->get();

        return $job;
    }

    public function updatejob($service,$instruction,$id){

        $data=array(
            'service'=>$service,
            'instruction'=>$instruction

        );

        DB::table('job_request')
            ->where('job_id',$id)
            ->update($data);
        return true;
    }
}
