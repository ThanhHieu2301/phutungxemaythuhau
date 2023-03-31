<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('district');
            $table->string('city');
            $table->string('street_address');
            $table->string('zip');
            $table->string('payment_type');
            $table->boolean('check_shipping')->nullable()->default(0);
            $table->boolean('transport')->nullable()->default(0);
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
}
