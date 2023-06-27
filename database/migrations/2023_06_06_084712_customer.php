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
        //
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('GUInumber');//A.K.A 統編
            $table->string('Organization_Name');
            $table->string('Organization_Address');
            $table->string('contactPerson');
            $table->string('contactPerson_Email');
            $table->string('contactPerson_PhoneNumber');
            $table->integer('status');
            $table->integer('FAEID');
            $table->integer('SalesID');
            $table->string('note');
            $table->dateTime('register_at');
            $table->dateTime('transfer_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
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
        //
        Schema::dropIfExists('customers');
    }
};
