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
            $table->unsignedBigInteger('id_staff');
            $table->foreign('id_staff')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->longText('note')->nullable();
            $table->enum('overtime', ['iya', 'tidak'])->default('iya');
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
        Schema::dropIfExists('absents');
    }
}
