<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedByToFormulirUjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formulir_uji', function (Blueprint $table) {
            // Adding the foreign key column to track the user who made the update
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
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
            // Drop the foreign key and the column when rolling back the migration
            $table->dropConstrainedForeignId('updated_by');
        });
    }
}
