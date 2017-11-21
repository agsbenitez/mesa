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

        Schema::create('perfil', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombrePerfil');

        });

        Schema::create('estados', function (Blueprint $table){
            $table->increments('id');
            $table->string('estado');
        });

        Schema::create('areas', function (Blueprint $table){
            $table->increments('id');
            $table->string('area');
            $table->integer('responsable')->unsigned();
            $table->foreign('responsable')->references('id')->on('users');
        });

        Schema::create('expedientes', function (Blueprint $table){
            $table->increments('id');
            $table->string('comitente');
            $table->string('destinatario');
            $table->dateTime('fecha_alta');
            $table->dateTime('facha_caducidad');
            $table->dateTime('fecha_resolucion');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('areas');
            $table->string('asunto');
            $table->float('presupuesto');
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('estados');
            $table->string('lugar');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comentarioExp', function (Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('expedientes');
            $table->string('comentario');
        });



        Schema::create('nubePalabras', function(Blueprint $table){
            $table->increments('id');
            $table->string('palabra');
        });

        Schema::create('palabrasXExp', function (Blueprint $table){
            $table->increments('id');
            $table->integer('exp')->unsigned();
            $table->foreign('exp')->references('id')->on('expedientes');
            $table->integer('palabra')->unsigned();
            $table->foreign('palabra')->references('id')->on('nubePalabras');

        });

        Schema::create('expRecorrido', function(Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('expedientes');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('areas');
            $table->dateTime('fechaIngreso');
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('id')->on('estados');
        });

        Schema::create('usuarioxArea', function (Blueprint $table){
            $table->increments('id');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users');
        });

        Schema::create('files', function (Blueprint $table){
            $table->increments('id');
            $table->integer('expediente')->unsigned();
            $table->foreign('expediente')->references('id')->on('expedientes');
            $table->string('Path');
        });

        Schema::create('estadosFiles', function (Blueprint $table){
            $table->increments('id');
            $table->integer('files')->unsigned();
            $table->foreign('files')->references('id')->on('files');

        });

        
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perfil');
        Schema::drop('estados');
        Schema::drop('areas');
        Schema::drop('expedientes');
        Schema::drop('comentarioExp');
        Schema::drop('nubePalabras');
        Schema::drop('palabrasXExp');
        Schema::drop('expRecorrido');
        Schema::drop('usuarioxArea');
        Schema::drop('files');
        Schema::drop('estadosFiles');
    }
}
