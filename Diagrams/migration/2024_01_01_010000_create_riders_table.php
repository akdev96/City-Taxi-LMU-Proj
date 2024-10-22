<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->id('riderId'); // Primary Key
            $table->foreignId('riderId')->constrained('users')->onDelete('cascade');
            $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riders');
    }
}