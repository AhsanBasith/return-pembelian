<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelBarang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'id',
        'nama_barang',
        'kode_barang',
        'kategori',
        'harga',
        // 'stok',
        'supplier',
        'kualitas'
    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
