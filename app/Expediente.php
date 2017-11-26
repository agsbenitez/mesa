<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expediente extends Model
{
    public function area(){
        return $this->belongsTo('App\Area')->first();
    }

    public function getExpDesc(){
        return DB::table('expediente')
            ->orderByDesc('id')
            ->get();
    }
}
