<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('ride_requests', function (Blueprint $table) {
            $table->id('requestId'); // Primary Key
            $table->foreignId('riderId')->constrained('riders')->onDelete('cascade');
            $table->foreignId('pickupLocationId')->constrained('locations')->onDelete('cascade');
            $table->foreignId('dropOffLocationId')->constrained('locations')->onDelete('cascade');
            $table->string('requestStatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ride_requests');
    }
}
