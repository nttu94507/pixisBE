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

        Schema::create('employee', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id');//A.K.A 員編
            $table->string('Name');//名字
            // $table->string('Address');
            // $table->string('Email');
            // $table->string('PhoneNumber');
            // $table->string('contractPerson');//緊急聯絡人
            // $table->string('contractPerson_phonenumber');//緊急聯絡人電話
            // $table->dateTime('birthday');//出生年月日
            $table->longText('note')->nullable();//備註
            // $table->integer('department');//隸屬部門
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
        //
        Schema::dropIfExists('employee');
    }
};
