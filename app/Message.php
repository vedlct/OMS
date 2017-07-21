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
//        $type=session('user-type');
//
//        if ($type == 'Admin') {
//
////            $sms=DB::table('message')
////                ->where('sender','Admin')
////                ->orwhere('sender',$client1)
////                ->where('receiver','Admin')
////                ->orwhere('receiver',$client1)
////                ->orderBy('inserted_time', 'ASC')
////                ->get();
//            $sms = DB::select( DB::raw("SELECT * FROM `message` WHERE (`sender` = 'Admin' OR `sender` = '$client1') And (`receiver` = 'Admin' OR `receiver` = '$client1')") );
//
//
//        }
//        elseif($type == 'User'){
//
//            $username=session('order');
//
////            $sms=DB::table('message')
////                ->where('sender','Admin')
////                ->orwhere('sender',$username)
////                ->where('receiver','Admin')
////                ->orwhere('receiver',$username)
////                ->orderBy('inserted_time', 'ASC')
////                ->get();
//            $sms = DB::select( DB::raw("SELECT * FROM `message` WHERE (`sender` = 'Admin' OR `sender` = '$username') And (`receiver` = 'Admin' OR `receiver` = '$username')") );
//            //$sms="User";
//        }
//
//        return $sms;


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
//        $sms=DB::table('message')
//            ->where('sender','Admin')
//            ->orwhere('sender',$client1)
//            ->where('receiver','Admin')
//            ->orwhere('receiver',$client1)
//            ->orderBy('inserted_time', 'ASC')
//            ->get();
        return $sms;
    }


    public function insertsms($text,$client1) {

//        $type=session('user-type');
//        $client=session('order');
//
//        if ($type == 'Admin'){
//
//            $data =array(
//                'sender' => 'Admin',
//                'receiver' => $client1,
//                'sms' => $text,
//                'job' => '',
//                'status' => 'unseen'
//
//            );
//        }else {
//            $data =array(
//                'sender' => $client,
//                'receiver' => 'Admin',
//                'sms' => $text,
//                'job' => '',
//                'status' => 'unseen'
//
//            );
//
//        }
//
//        DB::table('message')->insert($data);

        $type=session('user-type');
        $client=session('order');
        $data1=array
        (
            'status'=>'Seen'
        );

        if ($type == 'Admin')
        {

            DB::table('message')
                ->where('sender',$client1)
                ->where('receiver','Admin')
                ->update($data1);

            $data =array(
                'sender' => 'Admin',
                'receiver' => $client1,
                'sms' => $text,
                'job' => '',
                'status' => 'unseen'

            );
        }
        elseif($type == 'User')
        {

            DB::table('message')
                ->where('sender','Admin')
                ->where('receiver',$client1)
                ->update($data1);

            $data =array(
                'sender' => $client,
                'receiver' => 'Admin',
                'sms' => $text,
                'job' => '',
                'status' => 'unseen'

            );

        }

        DB::table('message')->insert($data);
    }

    public function getNotifAdmin () {
        $count = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` !='Admin' ") );

        return $count;
    }
}
