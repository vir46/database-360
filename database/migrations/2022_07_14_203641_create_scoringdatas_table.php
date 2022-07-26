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
        Schema::dropIfExists('scoringdata');
        Schema::create('scoringdata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_from')->constrained('karyawan');
            $table->foreignId('id_to')->constrained('karyawan');
            $table->integer('quality');
            $table->integer('relation');
            $table->integer('speed');
            $table->string('kelebihan');
            $table->string('kurang');
            $table->string('additional_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scoringdatas');
    }
};
