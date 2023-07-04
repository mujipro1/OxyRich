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
            $table->id('order_no');
            $table->timestamp('order_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('username');
            $table->enum('type', ['19L', '6L', '1.5L', '0.5L']);
            $table->integer('empty_bottles');
            $table->integer('filled_bottles');
            $table->decimal('bill', 10, 2);
            $table->decimal('cash', 10, 2);
            $table->decimal('balance', 10, 2)->storedAs('bill - cash'); //todays's balance
            $table->integer('bill_no')->nullable();
            $table->foreign('username')->references('username')->on('customer');
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

