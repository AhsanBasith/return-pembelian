<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ModelNotaRetur extends Model
{
    protected $table = 'nota_retur';
    protected $fillable = [
        'id',
        'barang_id',
        'tanggal_nota',
        'total_harga',
        'status_nota',
        'status_pengiriman'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
