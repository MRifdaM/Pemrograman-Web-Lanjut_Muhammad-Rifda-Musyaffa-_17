<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'barang_id',
        'user_id',
        'supplier_id',
        'stok_tanggal_masuk',
        'stok_jumlah'
    ];

    // protected $fillable = [
    //     'barang_id',
    //     'user_id',
    //     'supplier_id',
    //     'stok_jumlah'
    // ];
}
