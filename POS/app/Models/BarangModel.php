<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_jual',
        'harga_beli'
    ];

    // protected $fillable = [
    //     'kategori_id',
    //     'barang_kode',
    //     'barang_nama',
    //     'harga_jual',
    // ];
    
}
