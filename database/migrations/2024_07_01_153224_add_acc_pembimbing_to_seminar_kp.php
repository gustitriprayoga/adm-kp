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
        Schema::table('seminar_kps', function (Blueprint $table) {
            $table->string('acc_pembimbing')->after('alasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seminar_kps', function (Blueprint $table) {

            $table->string('acc_pembimbing')->after('alasan')->nullable();
        });
    }
};
