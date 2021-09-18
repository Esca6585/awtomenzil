<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->text('ady');
            $table->text('familiyasy');
            $table->text('atasynyn_ady');
            $table->string('tabel_belgisi')->unique();
            $table->date('doglan_guni');
            $table->text('doglan_yeri');
            $table->text('bilimi');
            $table->string('pasport_belgisi');
            $table->text('pasport_alynan_yeri');
            $table->date('pasport_alynan_wagty');
            $table->string('telefon_belgisi');
            $table->text('yashayan_salgysy');
            $table->text('suraty');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('drivers');
    }
}
