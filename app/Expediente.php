<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expediente extends Model
{
    public function are(){
        return $this->belongsTo('App\Area','area')->first();
    }

    public static function getExpDesc(){
        return DB::table('Expediente')
            ->orderByDesc('id')
            ->get();
    }

    //se crea este metodo para insertar en la responce los datos del area como u nuevo campo fullarea
    protected $appends= ["fullarea"];

    public function getFullareaAttribute(){
        return $this->are();
}
}
