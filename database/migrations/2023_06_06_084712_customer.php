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
            $table->string('contractPerson');
            $table->string('contractPerson_Email');
            $table->string('contractPerson_PhoneNumber');
            $table->integer('status');//0:保固 1:過保 2:處理中
            $table->integer('FAEID');
            $table->integer('SalesID');
            $table->longText('note');
            $table->dateTime('order_at');//下單時間
            $table->dateTime('Maintenance_Agreement_at');//保固到期日
            // $table->dateTime('transfer_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
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
