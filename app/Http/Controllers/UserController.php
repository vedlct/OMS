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

    public function profile()
    {
        $type = session('user-type');
        if ($type == 'User') {


            $profile_info = (new User)->get();
            return view('Profile', compact('profile_info'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function newjobrequest()
    {

        $type = session('user-type');
        if ($type == 'User') {


            $newjobrequest = (new User)->get_active_service();

            return view('user.newjobrequest', compact('newjobrequest'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function insertnewjob(Request $request)
    {
        $type = session('user-type');
        if ($type == 'User') {


            $service_type = $request->servicetype;
            $instruction = $request->details_instruction;

            try {
                $insert_new_job = (new User)->insertjob($service_type, $instruction);
                echo "<script type=\"text/javascript\">
        alert(\"Job Request Send Successfully.\");
               window.location=\"/Home\";
                </script>";

                //return redirect(url('/Home'));

            } catch (Exception $e) {

                echo "<script type=\"text/javascript\">
        alert(\"There is an issue. Please Refresh the page and try again.\");
                window.location=\"/Home\";
                </script>";

                //return redirect(url('/Home'));
            }




        }
        else {
            return redirect(url('/'));
        }
    }
    public function ongoingjob()
    {

        $type = session('user-type');
        if ($type == 'User') {


            $ongoingwork = (new User)->ongoingjob();

            return view('user.ongoingjobinfo', compact('ongoingwork'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function pendingjob()
    {
        $type = session('user-type');
        if ($type == 'User') {

            $pendingwork = (new User)->pendingjob();

            return view('user.pendingjobinfo', compact('pendingwork'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function finshedjob()
    {

        $type = session('user-type');
        if ($type == 'User') {


            $finshedwork = (new User)->jobdone();

            return view('user.jobfinised', compact('finshedwork'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function changependingjob($id)
    {
        $type = session('user-type');
        if ($type == 'User') {
            $activeservice = (new User)->get_active_service();
            $job_instruction = (new User)->jobinstruction($id);


            return view('user.editjob', compact('activeservice', 'job_instruction'));
        }else {
            return redirect(url('/'));
        }
    }

    public function updatejob(Request $request)
    {
        $type = session('user-type');
        if ($type == 'User') {

            $service = $request->servicetype;
            $instruction = $request->details_instruction;
            $id = $request->id;
            //echo $instruction;


            try {
                $updatejob = (new User)->updatejob($service, $instruction, $id);
                echo "<script type=\"text/javascript\">
        alert(\"Job Request  Edited Successfully.\");
               window.location=\"/Home\";
                </script>";
                //return redirect(url('/Home'));

            } catch (Exception $e) {

                echo "<script type=\"text/javascript\">
        alert(\"There is an issue. Please Refresh the page and try again.\");
                window.location=\"/Home\";
                </script>";

                //return redirect(url('/Home'));
            }


            //return view('user.editjob',compact('activeservice','job_instruction'));
        }
        else {
            return redirect(url('/'));
        }
    }
}
