<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

use League\Flysystem\Exception;

class AdminController extends Controller
{

    public function index()
    {

    }

    public function profile()
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $profile_info = (new Admin)->get();
            return view('Profile', compact('profile_info'));
        } else {

            return redirect(url('/'));
        }
    }

    public function newjobrequest()
    {

        $type = session('user-type');
        if ($type == 'Admin') {

//        $id=session('user-id');
            $newjobrequest = (new Admin)->newjobrequest();

            return view('admin.newjobrequest', compact('newjobrequest'));
        } else {

            return redirect(url('/'));
        }
    }

    public function changejobstatus(Request $request)
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $id = $request->id;
            $value = $request->value;

            //$changestatus=(new Admin)->change_job_status($id,$value);

            try {
                $changestatus = (new Admin)->change_job_status($id, $value);
                echo "Job " . $value . " successfully.";

            } catch (Exception $e) {

                echo "There is an issue. Please Refresh the page and try again.";
            }

//        if (count($changestatus)!='')
//        {
//            echo "Job ".$value." successfully.";
//        }
//        else
//        {
//            echo "There is an issue. Please Refresh the page and try again.";
//        }


        } else {
            return redirect(url('/'));
        }
    }

    public function newuserrequest()
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $newuserrequest = (new Admin)->newuserrequest();

            return view('admin.newuserrequest', compact('newuserrequest'));
        } else {
            return redirect(url('/'));
        }
    }

    public function changeuserstatus(Request $request)
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $id = $request->id;
            $value = $request->value;



            try {
                $changestatus = (new Admin)->change_user_status($id, $value);
                echo "Account " . $value . " successfully.";

            } catch (Exception $e) {

                echo "There is an issue. Please Refresh the page and try again.";
            }


        } else {
            return redirect(url('/'));
        }
    }

    public function ongoingjob()
    {
        $type = session('user-type');
        if ($type == 'Admin') {

        $ongoingwork = (new Admin)->ongoingjob();

        return view('admin.ongoingjobinfo', compact('ongoingwork'));
    }
        else {
            return redirect(url('/'));
        }
}

    public function finshedjob()
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $finshedwork = (new Admin)->jobdone();

            return view('admin.jobfinised', compact('finshedwork'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function viewclient()
    {
        $type = session('user-type');
        if ($type == 'Admin') {
            $client_view = (new Admin)->clientinfoview();
            return view('admin.viewallclient', compact('client_view'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function clientinfo(Request $request)
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $id = $request->id;

            $client_view = (new Admin)->viewclient($id);
            return view('admin.clientinfo', compact('client_view'));
            //echo $id;
        } else {
            return redirect(url('/'));
        }
    }

    public function updateclientinfo(Request $request)
    {
        $type = session('user-type');
        if ($type == 'Admin') {


            $id = $request->userid;
            $type = $request->usertype;
            $company_name = $request->clientname;
            $contact_person = $request->contact;
            $contact_number = $request->number;
            $email = $request->email;
            $address = $request->address;
            $web = $request->web;

            //$update = (new Admin)->updateclient($id, $type, $company_name, $contact_person, $contact_number, $email, $address, $web);

            try {
                $update = (new Admin)->updateclient($id, $type, $company_name, $contact_person, $contact_number, $email, $address, $web);
                echo "<script type=\"text/javascript\">
				alert(\"Information Updated Successfully\");
				window.location=\"/ClientInfo\";
				</script>";

            } catch (Exception $e) {

                echo "<script type=\"text/javascript\">
				alert(\"There is an issue. Please Refresh the page and try again.\");
				window.location=\"/ClientInfo\";
				</script>";
            }

//        if (count($update)!='')
//        {
//            echo "<script type=\"text/javascript\">
//				alert(\"Information Updated Successfully\");
//				window.location=\"/ClientInfo\";
//				</script>";
//
//        }
//        else
//        {
//
//            echo "<script type=\"text/javascript\">
//				alert(\"There is an issue. Please Refresh the page and try again.\");
//				window.location=\"/ClientInfo\";
//				</script>";
//
//        }


        } else {
            return redirect(url('/'));
        }
    }
    public function serviceinfo()
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $allservice = (new Admin)->viewservice();
            return view('admin.sevice', compact('allservice'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function changeservicestatus(Request $request)
    {
        $type = session('user-type');
        if ($type == 'Admin') {


            $id = $request->id;
            $value = $request->value;


            //$client_view=(new Admin)->change_service_status($id,$value);

            try {
                $client_view = (new Admin)->change_service_status($id, $value);
                echo "Service " . $value . " successfully.";

            } catch (Exception $e) {

                echo "There is an issue. Please Refresh the page and try again.";
            }


//        if (count($client_view)!='')
//        {
//            echo "Service ".$value." successfully.";
//        }
//        else
//        {
//            echo "There is an issue. Please Refresh the page and try again.";
//        }


        }else {
            return redirect(url('/'));
        }
    }

    public function insertservice(Request $request)
    {

        $type = session('user-type');
        if ($type == 'Admin') {

            $name = $request->name;
            $type = $request->type;
            $status = $request->status;
            //$type=$request->type;

            // $insert_service=(new Admin)->insert_service($name,$type,$status);

            try {
                $insert_service = (new Admin)->insert_service($name, $type, $status);
                echo "<script type=\"text/javascript\">
				alert(\"Services Added Successfully\");
				window.location=\"/Service\";
				</script>";

            } catch (Exception $e) {

                echo "<script type=\"text/javascript\">
				alert(\"Something goes Wrong Pls try again\");
				window.location=\"/Service\";
				</script>";
            }

//        if (count($insert_service)!='')
//        {
//            echo "<script type=\"text/javascript\">
//				alert(\"Services Added Successfully\");
//				window.location=\"/Service\";
//				</script>";
//
//        }
//        else
//        {
//
//            echo "<script type=\"text/javascript\">
//				alert(\"Something goes Wrong Pls try again\");
//				window.location=\"/Service\";
//				</script>";
//
//        }


        }
        else {
            return redirect(url('/'));
        }
    }

    public function passchange()
    {
        $type = session('user-type');
        if ($type == 'Admin') {
            $getinfo = (new Admin)->getinfo();
            return view('admin.user_info_password', compact('getinfo'));
        }
        else {
            return redirect(url('/'));
        }
    }
    public function changeuserpass($id)
    {
        $type = session('user-type');
        if ($type == 'Admin') {


            $getpass = (new Admin)->getpass($id);
            return view('admin.passwordchange', compact('getpass'));
        }
        else {
            return redirect(url('/'));
        }
    }
    public function changepass(Request $request)
    {
        $type = session('user-type');
        if ($type == 'Admin') {

            $id = $request->id;
            //$name=$request->aname;

            $pass = $request->NP;
            $conpass = $request->CNP;




            if ($pass == $conpass) {


                try {
                    $changepass = (new Admin)->changepass($id, $pass);
                    echo "<script type=\"text/javascript\" >
				alert(\"Password Changed Successfully\");
				window.location=\"/PasswordChange\";
				</script>";

                } catch (Exception $e) {

                    echo "<script type=\"text/javascript\" >
				alert(\"Something Went Wrong\");
				window.location=\"/PasswordChange\";
				</script>";
                }

//            if (count($changepass !='')){
//
//
//                echo "<script type=\"text/javascript\" >
//				alert(\"Password Changed Successfully\");
//				window.location=\"/PasswordChange\";
//				</script>";
//            }
//            else{
//
//                echo "<script type=\"text/javascript\" >
//				alert(\"Something Went Wrong\");
//				window.location=\"/PasswordChange\";
//				</script>";
//            }

            } else {

                echo "<script type=\"text/javascript\" >
				alert(\"Password and Confirm Password doesn't match.please try again\");
				window.location=\"/PasswordChange\";
				</script>";
            }

        }
        else {
            return redirect(url('/'));
        }
    }
    public function servicedelete($id)
    {


        $type = session('user-type');
        if ($type == 'Admin') {


            try {
                $del_service = (new Admin)->delete_service($id);
                echo "Service deleted successfully";

            } catch (Exception $e) {

                echo "There is an issue. Please Refresh the page and try again.";
            }

//        if (count($del_service)!=''){
//
//            echo "Service deleted successfully";
//        }
//        else{
//            echo "Something Wrong.please try again";
//        }
            //return view('admin.passwordchange',compact('getpass'));
        }
        else {
            return redirect(url('/'));
        }
    }

    public function jobreqdelete($id)
    {
        $type = session('user-type');
        if ($type == 'Admin') {

            try {
                $del_job_req = (new Admin)->delete_job_req($id);
                echo " Pending Job Request deleted successfully";

            } catch (Exception $e) {

                echo "There is an issue. Please Refresh the page and try again.";
            }


//        if (count($del_job_req)!=''){
//
//            echo " Pending Job Request deleted successfully";
//        }
//        else{
//            echo "Something Wrong.please try again";
//        }
            //return view('admin.passwordchange',compact('getpass'));
        }
        else {
            return redirect(url('/'));
        }
    }




}
