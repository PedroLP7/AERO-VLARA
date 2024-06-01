<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users2', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('userName', 255)->nullable(false)->unique();
            $table->string('LastName1', 255)->nullable(false);
            $table->string('LastName2', 255)->nullable();
            $table->string(('Email'), 255)->nullable(false)->unique();
            $table->string('phone', 255)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);
            $table->unsignedBigInteger('userTypeId_fk');
            $table->timestamps();

            $table->foreign('userTypeId_fk')->references('idType')->on('user_types');
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
