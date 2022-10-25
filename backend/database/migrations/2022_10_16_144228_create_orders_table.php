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
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            // $table->integer('customer_id');
            // $table->integer('amount');
            // $table->string('status');
            // $table->dateTime('billed_date');
            // $table->dateTime('paid_date')->nullable();
            // $table->timestamps();

            $table->id();
            $table->integer('customer_id');
            $table->integer('total');
            $table->tinyInteger('status')->default(0);
            $table->string('address');
            $table->string('phone');
            $table->string('fullname');
            $table->string('email');
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
        Schema::dropIfExists('orders');
    }
};
