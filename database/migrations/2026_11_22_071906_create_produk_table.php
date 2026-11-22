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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk', 100);
            $table->string('jenis_kopi', 20);
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('ukuran_kemasan')->nullable();
            $table->decimal('harga', 12, 2);
            $table->unsignedInteger('stok');
            $table->string('gambar', 255)->nullable();
            $table->boolean('status_aktif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
