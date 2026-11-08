<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->enum('kategori', ['Rumah 2 Lantai', 'Interior', 'Kitchen Set', 'Kamar Mandi', 'Lainnya']);
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('luas_bangunan')->nullable();
            $table->year('tahun')->nullable();
            $table->enum('status', ['Draft', 'Published'])->default('Draft');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};