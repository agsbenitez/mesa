<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expediente extends Model
{
    public function area(){
        return $this->belongsTo('App\Area')->first();
    }

    public static function getExpDesc(){
        return DB::table('Expediente')
            ->orderByDesc('id')
            ->get();
    }
}
