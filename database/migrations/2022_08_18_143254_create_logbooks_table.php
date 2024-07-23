<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->integer('bimbingan_id');
            $table->string('kegiatan');
            $table->string('deskripsi');
            $table->string('tgl');
            $table->string('dokumentasi');
            $table->string('dokumentasi2');
            $table->string('paraf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbooks');
    }
};
