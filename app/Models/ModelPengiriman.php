<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'nota_retur_id',
        'tanggal_pengiriman',
        'status_pengiriman',
        'catatan',
    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
