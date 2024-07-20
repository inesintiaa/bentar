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
        Schema::table('tikets', function (Blueprint $table) {
            $table->foreignId('konser_id')->constrained('konsers')->onDelete('cascade');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreignId('peserta_id')->constrained('users')->onDelete('cascade');
        });
        Schema::table('riwayats', function (Blueprint $table) {
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
            $table->foreignId('tiket_id')->constrained('tikets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayats', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id']);
            $table->dropForeign(['tiket_id']);
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['peserta_id']);
        });

        Schema::table('tikets', function (Blueprint $table) {
            $table->dropForeign(['konser_id']);
        });
    }
};
