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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pat_id')->unsigned();
            $table->bigInteger('serv_id')->unsigned();
            $table->date('date');
            $table->string('time');
            $table->string('status')->default('Pending');
            $table->foreign('pat_id')->references('id')->on('patients');
            $table->foreign('serv_id')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
