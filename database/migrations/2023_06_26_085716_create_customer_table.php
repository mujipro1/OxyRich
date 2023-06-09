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
            $table->boolean('is_active')->default(true);
            $table->string('phone_no', 12)->unique();
            $table->decimal('bottle_price', 10, 2);
            $table->string('bottle_type', 100)->default('19L');
            $table->integer('no_of_bottles');
            $table->text('description')->nullable();
            $table->integer('active_bottles')->default(0);
            $table->decimal('total_balance', 10, 2)->default(0);
            $table->decimal('per_bottle_security', 10, 2);
            $table->decimal('total_bottle_security', 10, 2)->storedAs('no_of_bottles * per_bottle_security');
            $table->boolean('dispenser')->default(false);
            $table->integer('no_of_dispenser');
            $table->decimal('per_dispenser_security', 10, 2);
            $table->decimal('total_dispenser_security', 10, 2)->storedAs('no_of_dispenser * per_dispenser_security');
            $table->foreign('username')->references('username')->on('users');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
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
