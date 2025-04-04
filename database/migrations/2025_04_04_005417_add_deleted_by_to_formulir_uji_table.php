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
            $table->string('deleted_by')->nullable();  // Track who deleted the record
        });
    }

    public function down()
    {
        Schema::table('formulir_uji', function (Blueprint $table) {
            $table->dropColumn('deleted_by');  // Remove the deleted_by column if rolling back
        });
    }
};
