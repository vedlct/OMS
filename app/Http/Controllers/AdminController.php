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
}
