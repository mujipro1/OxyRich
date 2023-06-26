<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->default('Oxyrich Pakistan');
            $table->string('phone_no', 12)->default('0336-4448494');
            $table->string('account_no', 20)->default('17657901787903');
            $table->string('NTN', 50)->default('8238392-8');
            $table->string('address', 200)->default('Insaf Plaza F-10 Markaz, Islamabad');
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
        Schema::dropIfExists('company');
    }
}
