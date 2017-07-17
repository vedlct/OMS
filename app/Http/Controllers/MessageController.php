<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    protected function showAdminsms(){
        $client_view=(new Message)->getClient();
        return view('admin.message',compact('client_view'));

    }
}
