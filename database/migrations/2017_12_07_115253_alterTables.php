<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('perfil', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('estados', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('comentarioExp', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('nubePalabras', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('palabrasXExp', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('expRecorrido', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('usuarioxArea', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('files', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('estadosFiles', function (Blueprint $table){
            $table->timestamps();
            $table->softDeletes();
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
