<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->nullable(false)->unique();
            $table->string('firstname',30)->nullable(false);
            $table->string('surname',30)->nullable(false);
            $table->string('email',50)->unique()->nullable()->change;
            $table->integer('user_group_id')->nullable(false)->unsigned()->default(2);
            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->string('password')->nullable()->change;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
