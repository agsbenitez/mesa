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
        Schema::create('Usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('password');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('email');
            $table->foreign('perfil')->references('id')->on('Perfil');
            $table->timestamps();
        });

        Schema::create('Perfil', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->integer('permisos');
        });

        Schema::create('Estados', function (Blueprint $table){
            $table->increments('id');
            $table->string('estado');
        });

        Schema::create('Expedientes', function (Blueprint $table){
            $table->increments('id');
            $table->string('comitente');
            $table->string('destinatario');
            $table->dateTime('fecha_alta');
            $table->dateTime('facha_caducidad');
            $table->dateTime('fecha_resolucion');
            $table->foreign('area')->references('id')->on('Areas');
            $table->string('asunto');
            $table->float('presupuesto');
            $table->foreign('estado')->references('id')->on('Estados');
            $table->string('lugar');
        });

        Schema::create('Comentario_exp', function (Blueprint $table){
            $table->increments('id');
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->string('comentario');
        });

        Schema::create('Areas', function (Blueprint $table){
           $table->increments('id');
           $table->string('area');
           $table->foreign('responsable')->referecnces('id')->on('Usuarios');
        });

        Schema::create('Nube_Palabras', function(Blueprint $table){
            $table->increments('id');
            $table->string('palabra');
        });

        Schema::create('PalabrasXExp', function (Blueprint $table){
            $table->increments('id');
            $table->foreign('exp')->references('id')->on('Expedientes');
            $table->foreign('palabra')->references('id')->on('Nube_Palabras');

        });

        Schema::create('ExpRecorrido', function(Blueprint $table){
            $table->increments('id');
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->foreign('area')->references('id')->on('Areas');
            $table->dateTime('fechaIngreso');
            $table->foreign('estado')->references('id')->on('Estados');
        });

        Schema::create('UsuarioxArea', function (Blueprint $table){
            $table->increments('id');
            $table->foreign('usuario')->references('id')->on('Usuarios');
        });

        Schema::create('Files', function (Blueprint $table){
            $table->increments('id');
            $table->foreign('expediente')->references('id')->on('Expedientes');
            $table->string('Path');
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
