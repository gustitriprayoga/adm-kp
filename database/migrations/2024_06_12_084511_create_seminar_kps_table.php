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
        Schema::create('seminar_kps', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->cascadeOnDelete();
            $table->string('mahasiswa_nama');
            $table->string('mahasiswa_nim');
            $table->string('judul');
            $table->string('pembimbing');
            $table->string('tanggal')->default('0000-00-00')->nullable();
            $table->string('jam')->default('00.00')->nullable();
            $table->string('bukti_hadir_seminar');
            $table->string('bukti_perbaikan_seminar');
            $table->string('status')->nullable();
            $table->string('alasan')->nullable();
            $table->string('acc')->nullable();
            $table->string('alasan_acc')->nullable();
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
        Schema::dropIfExists('seminar_kps');
    }
};
