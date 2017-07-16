<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

    }

    public function newjobrequest(){


        $newjobrequest=(new User)->get_active_service();

        return view('user.newjobrequest',compact('newjobrequest'));
    }
}
