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

    protected function showsmsuser($client1){

        $client_view=(new Message)->getClientsms($client1);

       // dd($client_view) ;

        return view('message',compact('client_view','client1'));

    }


    public function showMessageBody($client1){

        //$client1= $request->client;

        $sms=(new Message)->getSms($client1);


        return view('messagebody' ,compact('sms','client1'));

    }
    public function inputsms( Request $request,$client1) {


        $text= $request->sms;

        //dd($receiver);
        try{
            $save= (new Message())->insertsms($text,$client1);
            return redirect()->route('usersms',[$client1]);
        }
        catch (Exception $e){
            echo "loss project :P";
        }



    }
}
