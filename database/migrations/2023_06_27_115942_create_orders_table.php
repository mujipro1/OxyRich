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
            $table->string('type', 20)->checkIn(['19 ltr', '6 ltr', '1.5 ltr', '0.5 ltr']);
            $table->integer('quantity');
            $table->decimal('bottle_price', 10, 2);
            $table->decimal('total_amount', 10, 2);
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

