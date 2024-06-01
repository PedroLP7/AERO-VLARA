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
        Schema::create('flights', function (Blueprint $table) {
            $table->id('idFlight');
            $table->timestamps();
            $table->string('flightNumber', 255)->unique();
            $table->string('departure', 255);
            $table->string('arrival', 255);
            $table->dateTime('departureTime');
            $table->dateTime('arrivalTime');
            $table->unsignedBigInteger('planeId_fk');
            $table->unsignedBigInteger('pilotId_fk');
            $table->unsignedBigInteger('copilotId_fk');


            $table->foreign('planeId_fk')->references('idPlane')->on('planes');
            $table->foreign('pilotId_fk')->references('idPilot')->on('pilots');
            $table->foreign('copilotId_fk')->references('idPilot')->on('pilots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
