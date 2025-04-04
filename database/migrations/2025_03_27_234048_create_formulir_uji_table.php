<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirUjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir_uji', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->string('jenis_contoh_uji');
            $table->decimal('volume_contoh_uji', 10, 2);
            $table->integer('jumlah_sample');
            $table->string('wadah_contoh_uji');
            $table->string('kondisi');
            $table->string('pengawetan');
            $table->string('abnormalitas');
            $table->string('lokasi_pengambilan_sample');
            $table->date('tanggal_pengambilan_sample');
            $table->json('parameters'); // Store parameters as JSON
            $table->decimal('total_harga', 10, 2); // Total price
            $table->softDeletes();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null'); // Track who deleted
            $table->timestamps();
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('payment_proof')->nullable(); // To store the image file path

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulir_uji');
    }
}
