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
        Schema::create('nilaikps', function (Blueprint $table) {
            $table->id();
            $table->integer('nilai_presentasi')->nullable();
            $table->integer('nilai_ppt')->nullable();
            $table->integer('nilai_project')->nullable();
            $table->integer('nilai_laporankp')->nullable();
            $table->string('huruf');
            $table->integer('rata2');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('mhs_id');
         	$table->integer('prodi_id')->nullable();
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
        Schema::dropIfExists('nilaikps');
    }
};
