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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pinjaman');
            $table->date('tanggal_pinjam');
            $table->string('nik');
            $table->string('nama');
            $table->string('jangka_waktu');
            $table->decimal('bunga_persen');
            $table->decimal('total_bunga');
            $table->decimal('total_angsuran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
