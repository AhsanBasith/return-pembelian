<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->nullable();
            $table->string('kode_barang');
            $table->string('kategori')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->string('supplier')->nullable();
            $table->string('kualitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
