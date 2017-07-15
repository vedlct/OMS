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
        //echo $value;


    }

    public function newuserrequest(){

        $newuserrequest=(new Admin)->newuserrequest();

        return view('admin.newuserrequest',compact('newuserrequest'));
    }

    public function changeuserstatus(Request $request){

        $id=$request->id;
        $value=$request->value;

        $changestatus=(new Admin)->change_user_status($id,$value);

        if (count($changestatus)!='')
        {
            echo "Account ".$value." successfully.";
        }
        else
        {
            echo "There is an issue. Please Refresh the page and try again.";
        }


    }

    public function ongoingjob(){


        $ongoingwork=(new Admin)->ongoingjob();

        return view('admin.ongoingjobinfo',compact('ongoingwork'));
    }

    public function finshedjob(){


        $finshedwork=(new Admin)->jobdone();

        return view('admin.jobfinised',compact('finshedwork'));
    }

    public function viewclient(){

        $client_view=(new Admin)->clientinfoview();
        return view('admin.viewallclient',compact('client_view'));
    }

    public function clientinfo(Request $request){

        $id=$request->id;

        $client_view=(new Admin)->viewclient($id);
        return view('admin.clientinfo',compact('client_view'));
        //echo $id;
    }

    public function updateclientinfo(Request $request)
    {

        $id = $request->userid;
        $type = $request->usertype;
        $company_name = $request->clientname;
        $contact_person = $request->contact;
        $contact_number = $request->number;
        $email = $request->email;
        $address = $request->address;
        $web = $request->web;

        $update = (new Admin)->updateclient($id, $type, $company_name, $contact_person, $contact_number, $email, $address, $web);

        if (count($update)!='')
        {
            echo "<script type=\"text/javascript\">
				alert(\"Information Updated Successfully\");
				window.location=\"/ClientInfo\";
				</script>";

        }
        else
        {

            echo "<script type=\"text/javascript\">
				alert(\"There is an issue. Please Refresh the page and try again.\");
				window.location=\"/ClientInfo\";
				</script>";

        }


    }
    public function serviceinfo(){

        $allservice=(new Admin)->viewservice();
        return view('admin.sevice',compact('allservice'));
    }

    public function changeservicestatus(Request $request){

        $id=$request->id;
        $value=$request->value;


        $client_view=(new Admin)->change_service_status($id,$value);



        if (count($client_view)!='')
        {
            echo "Account ".$value." successfully.";
        }
        else
        {
            echo "There is an issue. Please Refresh the page and try again.";
        }


    }

    public function insertservice(Request $request){

        $name=$request->name;
        $type=$request->type;
        $status=$request->status;
        //$type=$request->type;

        $insert_service=(new Admin)->insert_service($name,$type,$status);

        if (count($insert_service)!='')
        {
            echo "<script type=\"text/javascript\">
				alert(\"Services Added Successfully\");
				window.location=\"/Service\";
				</script>";

        }
        else
        {

            echo "<script type=\"text/javascript\">
				alert(\"Something goes Wrong Pls try again\");
				window.location=\"/Service\";
				</script>";

        }



    }

    public function passchange(){

        $getinfo=(new Admin)->getinfo();
        return view('admin.user_info_password',compact('getinfo'));
    }


}
