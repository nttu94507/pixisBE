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
            $table->integer('ownerID')->default(0);
            $table->dateTime('register');
            $table->dateTime('manufacture')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('type');
            $table->integer('price')->default(0);
            $table->integer('cost')->default(0);
            $table->string('note')->default('');
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
