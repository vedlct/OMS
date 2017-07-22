<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{

    public function getClientunseen()
    {
        $clientunseen= DB::table('message')
          ->where('sender','!=','Admin')
            ->where('status','=','unseen')
            ->groupBy('sender')
            ->get(['sender']);


        return $clientunseen;


    }
    public function getClientseen()
    {
        $clientseen= DB::table('message')
            ->where('sender','!=','Admin')
            ->where('status','=','seen')
            ->groupBy('sender')
            ->get(['sender']);


        return $clientseen;


    }
    public function getClientsms($client1)
    {


        $data1=array
        (
            'status'=>'Seen'
        );

        $type=session('user-type');

        if ($type == 'Admin') {


            DB::table('message')
                ->where('sender',$client1)
                ->where('receiver','Admin')
                ->update($data1);

//            $sms=DB::table('message')
//                ->where('sender','Admin')
//                ->orwhere('sender',$client1)
//                ->where('receiver','Admin')
//                ->orwhere('receiver',$client1)
//                ->orderBy('inserted_time', 'ASC')
//                ->get();

            $sms = DB::select( DB::raw("SELECT * FROM `message` WHERE (`sender` = 'Admin' OR `sender` = '$client1') And (`receiver` = 'Admin' OR `receiver` = '$client1')") );


        }
        elseif($type == 'User'){



            DB::table('message')
                ->where('sender','Admin')
                ->where('receiver',$client1)
                ->update($data1);

            $username=session('order');


            $sms = DB::select( DB::raw("SELECT * FROM `message` WHERE (`sender` = 'Admin' OR `sender` = '$username') And (`receiver` = 'Admin' OR `receiver` = '$username')") );
            //$sms="User";
        }

        return $sms;



    }

    public function getSms($client1){



$sms = DB::select( DB::raw("SELECT * FROM `message` WHERE (`sender` = 'Admin' OR `sender` = '$client1') And (`receiver` = 'Admin' OR `receiver` = '$client1')") );

        return $sms;
    }


    public function insertsms($text,$client1) {



        $type=session('user-type');
        $client=session('order');


        if ($type == 'Admin')
        {



            $data =array(
                'sender' => 'Admin',
                'receiver' => $client1,
                'sms' => $text,

                'status' => 'unseen'

            );
        }
        elseif($type == 'User')
        {



            $data =array(
                'sender' => $client,
                'receiver' => 'Admin',
                'sms' => $text,

                'status' => 'unseen'

            );

        }

        DB::table('message')->insert($data);
    }


    public function comment($job_id){

//        $type=session('user-type');
//
//        $data1=array
//        (
//            'status'=>'Seen'
//        );
//
//        if ($type == 'Admin') {
//
//            DB::table('message')
//                ->join('message', 'job_request.job_id', '=', 'message.job')
//                ->where('job_status','On Going')
//                ->where('job_id',$job_id)
//                ->where('receiver','Admin')
//                ->update($data1);
//        }
//        elseif($type == 'User')
//        {
//            $client = session('order');
//            DB::table('message')
//                ->join('message', 'job_request.job_id', '=', 'message.job')
//                ->where('job_status','On Going')
//                ->where('job_id',$job_id)
//                ->where('sender','Admin')
//                ->where('receiver',$client)
//                ->update($data1);
//        }

        $comment=DB::table('job_request')

            ->join('message', 'job_request.job_id', '=', 'message.job')
            ->where('job_status','On Going')
            ->where('job_id',$job_id)
            ->get();

        return $comment;
    }

    public function insert_comment($job_id,$text){
        $type=session('user-type');
        $client = session('order');
        if($type == 'User') {


            $data = array(
                'sender' => $client,
                'receiver' => 'Admin',
                'sms' => $text,
                'job' => $job_id,
                'status' => 'unseen'

            );
        }
        elseif ($type == 'Admin'){

            $data =array(
                'sender' => 'Admin',
                'receiver' => $client,
                'sms' => $text,
                'job' =>$job_id ,
                'status' => 'unseen'

            );

        }
        DB::table('message')->insert($data);
        //return $comment;
    }

    public function getClientname(){


        $name=DB::table('customer_info')

            ->where('client_status','Active')
            ->get(['short_name']);

        return $name;
    }



    public function getNotifAdmin () {
        $count = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` !='Admin' AND `status`='unseen'") );

        return $count;
    }

    public function getlivemsg ($sender,$reciever) {
        $count = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` ='$sender' AND `receiver`='$reciever' AND `status`='unseen'") );
        return $count;
    }

}
