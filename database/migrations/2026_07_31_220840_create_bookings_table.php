<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->text('alamat')->nullable();
            $table->string('jenis_layanan');
            $table->date('tanggal_survey')->nullable();
            $table->text('pesan')->nullable();
            $table->enum('status', ['Menunggu', 'Diproses', 'Survey', 'Selesai', 'Ditolak'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};