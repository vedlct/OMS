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
            ->distinct()
            ->get(['sender']);


        return $client;


    }

}
