<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('driverId'); // Primary Key
            $table->foreignId('driverId')->constrained('users')->onDelete('cascade');
            $table->string('licenseNumber');
            $table->string('vehicleDetails');
            $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
