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
        Schema::create('probes', function (Blueprint $table) {
            $table->id();
            $table->string('probeId',20);
            $table->string('harddiskdrive',30);
            $table->string('status');
            $table->string('owner')->nullable();
            $table->date('register');
            $table->string('type');
            $table->string('note')->nullable();
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
