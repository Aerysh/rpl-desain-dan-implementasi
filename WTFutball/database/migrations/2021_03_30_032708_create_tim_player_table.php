<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim_player', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timId');
            $table->unsignedBigInteger('playerId');
            $table->timestamps();

            $table->foreign('timId')->references('id')->on('tim')->onDelete('cascade');
            $table->foreign('playerId')->references('id')->on('tim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim_player');
    }
}
