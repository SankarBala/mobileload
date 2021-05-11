<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->string('mobile_number');
            $table->string('operator');
            $table->string('account_type');
            $table->string('amount');
            $table->string('tx_id')->unique();
            $table->string('order_id')->nullable();
            $table->string('status');
            $table->string('recharge_by')->default('Self');
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
        Schema::dropIfExists('recharges');
    }
}
