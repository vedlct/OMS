<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{

    public function getClient()
    {
        $client= DB::table('message')
          ->where('sender','!=','Admin')
            ->groupBy('sender')
            ->get(['sender']);


        return $client;


    }
    public function getClientsms($client1)
    {
        $type=session('user-type');

        if ($type == 'Admin') {

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

            $username=session('order');

//            $sms=DB::table('message')
//                ->where('sender','Admin')
//                ->orwhere('sender',$username)
//                ->where('receiver','Admin')
//                ->orwhere('receiver',$username)
//                ->orderBy('inserted_time', 'ASC')
//                ->get();
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

        $type=session('user-type');
        $client=session('order');

        if ($type == 'Admin'){

            $data =array(
                'sender' => 'Admin',
                'receiver' => $client1,
                'sms' => $text,
                'job' => '',
                'status' => 'unseen'

            );
        }else {
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
}
