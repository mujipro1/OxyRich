<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigInteger('username')->primary();
            $table->string('name', 100);
            $table->text('address', 200);
            $table->string('email', 100)->unique();
            $table->string('sector', 100);
            $table->string('subsector', 100);
            $table->boolean('is_active')->default(true);
            $table->string('phone_no', 12)->unique();
            $table->decimal('bottle_price', 10, 2);
            $table->integer('no_of_bottles');
            $table->decimal('per_bottle_security', 10, 2);
            $table->decimal('total_bottle_security', 10, 2)->storedAs('no_of_bottles * per_bottle_security');
            $table->integer('no_of_dispenser');
            $table->decimal('per_dispenser_security', 10, 2);
            $table->decimal('total_dispenser_security', 10, 2)->storedAs('no_of_dispenser * per_dispenser_security');
            $table->foreign('username')->references('username')->on('users');
            $table->foreign('sector')->references('sector')->on('locations');
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
        Schema::dropIfExists('customer');
    }
}
