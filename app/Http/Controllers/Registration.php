<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\registrationm;

class Registration extends Controller
{
    protected function insertdata(Request $request){


        $loginname = $request->loginname;
        $pass = md5($request->pass);
        $clientname = $request->clientname;
        $contact = $request->contact;
        $number = $request->number;
        $email = $request->email;
        $address = $request->address;
        $web = $request->web;

        $short_name = implode('', array_map(function($v) { return $v[0]; }, explode(' ', $clientname)));

//        $save= (new registrationm)->insertdata($loginname,$pass,$clientname,$contact,$number,$email,$address,$web,$short_name);

        try{
            //your query
            $save= (new registrationm)->insertdata($loginname,$pass,$clientname,$contact,$number,$email,$address,$web,$short_name);

            echo "<script type=\"text/javascript\">
				alert(\"Registration Request Sent Successfully\");
				window.location=\"/\";
				</script>";
        }
        catch(Exception $e){
            echo "<script type=\"text/javascript\">
				alert(\"There is an issue. Please Refresh the page and try again.\");
				window.location=\"/Registration\";
				</script>";
        }


    }

}
