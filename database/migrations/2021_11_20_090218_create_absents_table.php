<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 8);
            $table->date('date');
            $table->time('arrival_time')->nullable();
            $table->time('go_home_time')->nullable();
            $table->string('description');
            $table->string('proof')->nullable();
            $table->timestamps();
            $table->foreign('nis')->references('nis')->on('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absents');
    }
}
