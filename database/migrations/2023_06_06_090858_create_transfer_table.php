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
        Schema::create('transfer', function (Blueprint $table) {
            $table->id();
            $table->integer('customerID');
            $table->string('contactPerson');
            $table->string('contactPersonEmail');
            $table->integer('transferType');
            $table->integer('FAEID');
            $table->integer('SalesID');
            $table->dateTime('expiry date');
            $table->dateTime('register_at');
            $table->dateTime('transfer_at');
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
        Schema::dropIfExists('transfer');
    }
};
