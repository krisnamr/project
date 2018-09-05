<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
             $table->integer('kegiatan_id')->unsigned();
             $table->foreign('kegiatan_id')->references('id')->on('kegiatan')->onDelete('cascade');
             $table->integer('jabatan_id')->unsigned();
             $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
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
        Schema::dropIfExists('list_jabatan');
    }
}
