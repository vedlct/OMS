<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\registrationm;

class Registration extends Controller
{
    protected function insertdata(Request $request){


        $loginname = $request->loginname;
        $pass = $request->pass;
        $clientname = $request->clientname;
        $contact = $request->contact;
        $number = $request->number;
        $email = $request->email;
        $address = $request->address;
        $web = $request->web;
        $save= (new registrationm)->insertdata($loginname,$pass,$clientname,$contact,$number,$email,$address,$web);

        return redirect('/registration');
    }

}
