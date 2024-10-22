<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id('rideId'); // Primary Key
            $table->foreignId('riderId')->nullable()->constrained('riders')->onDelete('set null');
            $table->foreignId('driverId')->nullable()->constrained('drivers')->onDelete('set null');
            $table->foreignId('startLocationId')->constrained('locations')->onDelete('cascade');
            $table->foreignId('endLocationId')->constrained('locations')->onDelete('cascade');
            $table->float('fare');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
