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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->foreignId('id_pesanan')->unique()->constrained('pesanan', 'id_pesanan')->cascadeOnDelete();
            $table->string('metode_pengiriman', 30);
            $table->string('nama_ekspedisi', 50)->nullable();
            $table->string('no_resi', 50)->nullable();
            $table->text('alamat_tujuan');
            $table->decimal('biaya_kirim', 12, 2)->default(0);
            $table->string('status_pengiriman', 30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
