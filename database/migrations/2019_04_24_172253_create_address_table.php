<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->change; 
            $table->string('street_number')->nullable()->change;
            $table->string('street_name')->nullable()->change;
            $table->string('street_address')->nullable()->change;
            $table->string('province')->nullable()->change;
            $table->string('post_code')->nullable()->change;
            $table->string('country')->nullable()->change;
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
        Schema::dropIfExists('address');
    }
}
