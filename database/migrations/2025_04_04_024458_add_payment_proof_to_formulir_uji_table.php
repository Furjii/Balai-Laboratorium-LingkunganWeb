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
        Schema::table('formulir_uji', function (Blueprint $table) {
            $table->string('payment_proof')->nullable(); // Store the file path
        });
    }

    public function down()
    {
        Schema::table('formulir_uji', function (Blueprint $table) {
            $table->dropColumn('payment_proof');
        });
    }
};
