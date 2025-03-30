<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('baku_mutu', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('parameter'); // column to store the parameter name
            $table->string('satuan'); // column to store the unit
            $table->string('metode_uji'); // column to store the testing method
            $table->string('harga'); // column to store the price
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baku_mutu');
    }
};
