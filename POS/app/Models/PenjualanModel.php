<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'tanggal_penjualan'
    ];

    // protected $fillable = [
    //     'user_id',
    //     'pembeli',
    //     'penjualan_kode'
    // ];
}
