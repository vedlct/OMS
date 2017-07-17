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

        $job_status=DB::table('job_request')
            ->where('job_id',$id)
            ->update(array('job_status'=>$value));
        return $job_status;
    }

    public function change_user_status($id,$value){

        DB::table('customer_info')
            ->where('user_id',$id)
            ->update(array('client_status'=>$value));

        return true;
    }

    public function newuserrequest(){

        $userrequest= DB::table('customer_info')
            ->where('client_status','Deactive')
            ->get();


        return $userrequest;
    }

    public function ongoingjob(){


        $ongoing=DB::table('job_request')

            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('job_status','On Going')
            ->get();

        return $ongoing;
    }

    public function jobdone(){


        $finshedwork=DB::table('job_request')

            ->join('customer_info', 'job_request.client_id', '=', 'customer_info.user_id')
            ->where('job_status','Done')
            ->get();

        return $finshedwork;
    }

    public function clientinfoview(){

        $id=session('user-id');

        $client_view= DB::table('customer_info')->get();
        return $client_view;

    }

    public function viewclient($id){
        $client_view= DB::table('customer_info')
            ->where('user_id',$id)
            ->get();
        return $client_view;

    }

    public function updateclient($id, $type, $company_name, $contact_person, $contact_number, $email, $address, $web){

        DB::table('customer_info')
            ->where('user_id',$id)
            ->update(array(
                'user_type'=>$type,
                'company_name'=>$company_name,
                'contact_person'=>$contact_person,
                'contact_no'=>$contact_number,
                'email'=>$email,
                'address'=>$address,
                'webaddress'=>$web,

            ));
        return true;
    }
    public function viewservice(){

        $service= DB::table('service')
            ->orderBy('service_name', 'ASC')
            ->get();
        return $service;
    }

    public function change_service_status($id,$value){

        DB::table('service')
            ->where('service_id',$id)
            ->update(array('service_status'=>$value));
        return true;
    }

    public function insert_service($name,$type,$status){

        $data=array(

            'service_name'=>$name,
            'service_type'=>$type,
            'service_status'=>$status
        );

        DB::table('service')->insert($data);

        return true;

    }

    public function getinfo(){

        $info= DB::table('customer_info')
            ->where('client_status', 'Active')
            ->orderBy('company_name', 'ASC')
            ->get();
        return $info;

    }
    public function getpass($id){

        $profile_info= DB::table('customer_info')
            ->where('user_id',$id)
            ->limit(1)
            ->get();
        return $profile_info;

    }

    public function changepass($id,$pass){

        $data=array(
            'password'=>$pass
        );

        DB::table('customer_info')
            ->where('user_id',$id)
            ->update($data);
        return true;
    }

    public function delete_service($id){

        $service= DB::table('service')
            ->where('service_id',$id)
            ->delete();

        return $service;

    }

    public function delete_job_req($id){

        $job= DB::table('job_request')
            ->where('job_id',$id)
            ->delete();

        return $job;

    }




}
