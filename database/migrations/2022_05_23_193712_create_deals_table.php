<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id('Deal');
            $table->unsignedBigInteger('Login')->default(0);
            $table->unsignedInteger('Action')->default(0);
            $table->unsignedInteger('Entry')->default(0);
            $table->timestamp('Time')->default(NULL);
            $table->string('Symbol', 32)->default('');
            $table->double('Price')->default(0);
            $table->double('Profit')->default(0);
            $table->unsignedBigInteger('Volume')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
