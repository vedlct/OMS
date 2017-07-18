<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

    }

    public function profile(){

        $profile_info=(new User)->get();
        return view('Profile',compact('profile_info'));
    }

    public function newjobrequest()
    {


        $newjobrequest = (new User)->get_active_service();

        return view('user.newjobrequest', compact('newjobrequest'));
    }

    public function insertnewjob(Request $request)
    {

        $service_type = $request->servicetype;
        $instruction = $request->details_instruction;

        $insert_new_job = (new User)->insertjob($service_type, $instruction);

        if (count($insert_new_job) != '') {

            echo "<script type=\"text/javascript\">
        alert(\"Job Request Send Successfully.\");
               window.location=\"/Home\";
                </script>";
            //return redirect('/usernewjobrequest');
        }
        else{

            echo "<script type=\"text/javascript\">
        alert(\"There is an issue. Please Refresh the page and try again.\");
                window.location=\"/Home\";
                </script>";
        }


    }
    public function ongoingjob(){


        $ongoingwork=(new User)->ongoingjob();

        return view('user.ongoingjobinfo',compact('ongoingwork'));
    }

    public function pendingjob(){


        $pendingwork=(new User)->pendingjob();

        return view('user.pendingjobinfo',compact('pendingwork'));
    }

    public function finshedjob(){


        $finshedwork=(new User)->jobdone();

        return view('user.jobfinised',compact('finshedwork'));
    }

    public function changependingjob($id){

        $activeservice = (new User)->get_active_service();
        $job_instruction=(new User)->jobinstruction($id);


        return view('user.editjob',compact('activeservice','job_instruction'));
    }

    public function updatejob(Request $request){

        $service=$request->servicetype;
        $instruction=$request->details_instruction;
        $id=$request->id;
        //echo $instruction;

        $updatejob = (new User)->updatejob($service,$instruction,$id);

        if (count($updatejob) != '') {

            echo "<script type=\"text/javascript\">
        alert(\"Job Request  Edited Successfully.\");
               window.location=\"/Home\";
                </script>";
            //return redirect('/usernewjobrequest');
        }
        else{

            echo "<script type=\"text/javascript\">
        alert(\"There is an issue. Please Refresh the page and try again.\");
                window.location=\"/Home\";
                </script>";
        }



        //return view('user.editjob',compact('activeservice','job_instruction'));
    }
}
