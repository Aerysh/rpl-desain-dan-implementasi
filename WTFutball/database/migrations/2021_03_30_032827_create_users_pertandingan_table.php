<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPertandinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_pertandingan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertandinganId');
            $table->unsignedBigInteger('awayId');
            $table->unsignedBigInteger('homeId');
            $table->timestamps();

            $table->foreign('pertandinganId')->references('id')->on('pertandingan')->onDelete('cascade');
            $table->foreign('awayId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('homeId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_pertandingan');
    }
}
