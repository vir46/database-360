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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->integer('competence_count')->default(0);
            $table->integer('uncompetence_count')->default(0);
            $table->boolean('choose_competence')->default(false);
            $table->boolean('choose_uncompetence')->default(false);
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
        Schema::dropIfExists('karyawan');
    }
};

// recreate table
// php artisan migrate:refresh --path=database/migrations