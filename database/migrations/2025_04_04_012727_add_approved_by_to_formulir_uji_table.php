<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedByToFormulirUjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulir_uji', function (Blueprint $table) {
            // Add approved_by column to track who approved the record
            $table->string('approved_by')->nullable();  // This will store the name of the person who approved the form
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formulir_uji', function (Blueprint $table) {
            // Remove the approved_by column if rolling back the migration
            $table->dropColumn('approved_by');
        });
    }
}
