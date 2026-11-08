<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string('nama_project');
            $table->string('lokasi')->nullable();
            $table->string('jenis_renovasi');
            $table->decimal('total_biaya', 15, 2)->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('estimasi_selesai')->nullable();
            $table->enum('status', ['Menunggu', 'Sedang Pengerjaan', 'Selesai', 'Batal'])->default('Menunggu');
            $table->unsignedTinyInteger('persentase_progress')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};