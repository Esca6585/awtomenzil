<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutocolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autocolumns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->bigInteger('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger('autocolumn_id')->unsigned();
            $table->foreign('autocolumn_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('autocolumns');
    }
}
