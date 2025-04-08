<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang'
    ];

    // protected $fillable = [
    //     'penjualan_id',
    //     'barang_id',
    //     'jumlah_barang'
    // ];
}
