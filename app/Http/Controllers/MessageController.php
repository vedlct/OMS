<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class MessageController extends Controller
{
    protected function showAdminsms(){

        $client_unseen=(new Message)->getClientunseen();
        $client_seen=(new Message)->getClientseen();
        return view('admin.message',compact('client_unseen','client_seen'));

    }

    protected function showsmsuser($client1){

        $client_view=(new Message)->getClientsms($client1);

       // dd($client_view) ;

        return view('message',compact('client_view','client1'));

    }
    protected function clientname(){

        $client_name=(new Message)->getClientname();
        return view('admin.newmessage',compact('client_name'));

    }


    public function showMessageBody($client1){

        //$client1= $request->client;

        $sms=(new Message)->getSms($client1);


        return view('messagebody' ,compact('sms','client1'));

    }
    public function inputsms( Request $request,$client1) {


        $text= $request->sms;

        //dd($client1);
        try{
            $save= (new Message())->insertsms($text,$client1);
            return redirect()->route('usersms',[$client1]);
        }
        catch (Exception $e){
            echo "There is an issue. Please Refresh the page and try again.";
        }
    }

    public function jobcomment(Request $request){

        $job_id= $request->id;

        $jobcomment=(new Message)->comment($job_id);

       // echo $jobcomment;
        return view('allcomment' ,compact('jobcomment','job_id'));

    }


    public function insert_job_comment(Request $request,$job_id){


        $text= $request->sms;



        try
        {
            $jobcomment=(new Message)->insert_comment($job_id,$text);
            $type=session('user-type');

            if ($type == "User") {
                echo "<script type=\"text/javascript\">
				alert(\"Comment Added on This Job Successfully.\");
				window.location.replace('/Home');
				</script>";
                return redirect()->route('ongoingjob_user');
            }
            elseif ($type == "Admin")
            {
                echo "<script type=\"text/javascript\">
				alert(\"Comment Added on This Job Successfully.\");
				window.location.replace('/Home');
				</script>";
            }

        }
        catch (Exception $e)
        {
            echo "<script type=\"text/javascript\">
				alert(\"There is an issue. Please Refresh the page and try again.\");
				window.location.replace('/Home');
				</script>";
        }


    }


    public function insertmessage(Request $request){

        $client1= $request->reciever;
        $text= $request->sms;
    try
    {
        $sendmsg = (new Message)->insertsms($text, $client1);
        return redirect(route('adminsms'));
    }
    catch (Exception $e)
    {
        echo "There is an issue. Please Refresh the page and try again.";
    }

    }


    public function getNotifAdmin() {

        try{
            $NotifAdminCount=(new Message)->getNotifAdmin();

            foreach ($NotifAdminCount as $n){
                echo $n->total;
            }

        }
        catch (Exception $e){

            echo "There is an issue. Please Refresh the page and try again.";
        }

    }

    public function getlivemsg(Request $request) {

        $sender=$request->sender;
        $reciever=$request->reciever;

        try{
            $getlivemsg=(new Message)->getlivemsg($sender,$reciever);

            foreach ($getlivemsg as $n){
                echo $n->total;
            }


        }
        catch (Exception $e){

            echo "There is an issue. Please Refresh the page and try again.";
        }
        //echo $reciever;




    }

}
