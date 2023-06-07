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
     * 
     *
     */
    public function up()
    {
        Schema::create('probes', function (Blueprint $table) {
            $table->id();
            $table->integer('probeId');
            $table->integer('harddiskdrive');
            $table->integer('status');
            $table->integer('ownerID');
            $table->dateTime('register');
            $table->dateTime('lastupdate');
            $table->integer('type');
            $table->integer('price');
            $table->integer('cost');
            $table->string('note');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probes');
        //
    }
};
