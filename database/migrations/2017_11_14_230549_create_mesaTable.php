<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('Usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('password');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('email');
            $table->foreign('perfil')->references('id')->on('Perfil');
            $table->timestamps();
        })*/;

        Schema::create('Perfil', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombrePerfil');

        });

        Schema::create('Estados', function (Blueprint $table){
            $table->increments('id');
            $table->string('estado');
        });

        Schema::create('Areas', function (Blueprint $table){
            $table->increments('id');
            $table->string('area');
            $table->integer('responsable')->unsigned();
            $table->foreign('responsable')->references('id')->on('users');
        });

        Schema::create('Expedientes', function (Blueprint $table){
            $table->increments('id');
            $table->string('comitente');
            $table->string('destinatario');
            $table->dateTime('fecha_alta');
            $table->dateTime('facha_caducidad');
            $table->dateTime('fecha_resolucion');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('Areas');
            $table->string('asunto');
            $table->float('presupuesto');
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('Estados');
            $table->string('lugar');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users');
        });

        Schema::create('ComentarioExp', function (Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->string('comentario');
        });



        Schema::create('NubePalabras', function(Blueprint $table){
            $table->increments('id');
            $table->string('palabra');
        });

        Schema::create('PalabrasXExp', function (Blueprint $table){
            $table->increments('id');
            $table->integer('exp')->unsigned();
            $table->foreign('exp')->references('id')->on('Expedientes');
            $table->integer('palabra')->unsigned();
            $table->foreign('palabra')->references('id')->on('NubePalabras');

        });

        Schema::create('ExpRecorrido', function(Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('Areas');
            $table->dateTime('fechaIngreso');
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('Estados');
        });

        Schema::create('UsuarioxArea', function (Blueprint $table){
            $table->increments('id');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users');
        });

        Schema::create('Files', function (Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->string('Path');
        });

        Schema::create('EstadosFiles', function (Blueprint $table){
            $table->increments('id');
            $table->integer('files')->unsigned();
            $table->foreign('files')->references('id')->on('Files');

        });

        
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
