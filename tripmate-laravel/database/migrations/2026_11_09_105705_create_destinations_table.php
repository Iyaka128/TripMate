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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('wilayah');
            $table->text('deskripsi');
            $table->string('harga');
            $table->decimal('rating', 3, 2)->default(0);
            $table->string('kategori')->default('Destinasi');
            $table->string('status')->default('Tersedia');
            $table->string('gambar');
            $table->string('gambar_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
