<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id('idPlane');
            $table->string('planeName', 255);
            $table->string('planeModel', 255);
            $table->string('planeBrand', 255);
            $table->string('planeSerial', 255)->unique();
            $table->string('planeRegistration', 255)->unique();
            $table->string('planeType', 255);
            $table->integer('capacity');
            $table->integer('seats');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes');
    }
};
