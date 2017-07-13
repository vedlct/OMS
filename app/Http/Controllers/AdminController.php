<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function index(){

    }
    public function profile(){

        $profile_info=(new Admin)->get();
       return view('Profile',compact('profile_info'));
    }

    public function newjobrequest(){

//        $id=session('user-id');
        $newjobrequest=(new Admin)->newjobrequest();

        return view('admin.newjobrequest',compact('newjobrequest'));
    }

    public function changejobstatus(Request $request){

        $id=$request->id;
        $value=$request->value;

        $changestatus=(new Admin)->change_job_status($id,$value);
        //echo $id;


    }

    public function newuserrequest(){

        $newuserrequest=(new Admin)->newuserrequest();

        return view('admin.newuserrequest',compact('newuserrequest'));
    }

    public function changeuserstatus(Request $request){

        $id=$request->id;
        $value=$request->value;

        $changestatus=(new Admin)->change_user_status($id,$value);



    }

    public function ongoingjob(){


        $ongoingwork=(new Admin)->ongoingjob();

        return view('admin.ongoingjobinfo',compact('ongoingwork'));
    }

    public function finshedjob(){


        $finshedwork=(new Admin)->jobdone();

        return view('admin.jobfinised',compact('finshedwork'));
    }

}
