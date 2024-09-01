<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nota_retur', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_nota')->nullable();
            $table->bigInteger('total_harga')->nullable();
            $table->string('status_nota')->nullable();
            $table->string('barang_id')->nullable();
            $table->string('status_pengiriman')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_retur');
    }
};
