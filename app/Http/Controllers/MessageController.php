<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class MessageController extends Controller
{
    protected function showAdminsms(){

        $client_view=(new Message)->getClient();
        return view('admin.message',compact('client_view'));

    }

    protected function showsmsuser(){

        $client_view=(new Message)->getClientsms();

        return view('message',compact('client_view'));

    }


    public function showMessageBody(Request $request){

        $client1= $request->client;

        $sms=(new Message)->getSms($client1);

        return view('messagebody' ,compact('sms','client1'));

    }
    public function inputsms( Request $request) {


        $text= $request->sms;
        try{
            $save= (new Message())->insertsms($text);
            return redirect()->route('usersms');
        }
        catch (Exception $e){
            echo "loss project :P";
        }



    }
}
