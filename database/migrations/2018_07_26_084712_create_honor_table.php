<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHonorTable extends Migration
{
    public function up()
    {
        Schema::create('honor', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('list_jabatan_id')->unsigned()->nullable();
             $table->foreign('list_jabatan_id')->references('id')->on('list_jabatan')->onDelete('cascade');
             $table->integer('lap_honor_id')->unsigned()->nullable();
             $table->foreign('lap_honor_id')->references('id')->on('lap_honor')->onDelete('cascade');
             $table->decimal('honor', 10, 2);
             $table->decimal('pajak', 10, 2);
             $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('honor');
    }
}
