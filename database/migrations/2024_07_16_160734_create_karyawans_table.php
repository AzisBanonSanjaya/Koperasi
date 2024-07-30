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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nik');
            $table->string('name');
            $table->string('departemen');
            $table->string('jabatan');
            $table->date('tanggal_bergabung');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status_keanggotaan');
            $table->date('expired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
