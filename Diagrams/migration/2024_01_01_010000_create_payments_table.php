<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('paymentId'); // Primary Key
            $table->foreignId('rideId')->constrained('rides')->onDelete('cascade');
            $table->foreignId('riderId')->constrained('riders')->onDelete('cascade');
            $table->string('paymentMethod');
            $table->float('amount');
            $table->string('paymentStatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
