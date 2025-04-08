<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'kategori_kode',
        'kategori_nama',
        'deskripsi'
    ];

    // protected $fillable = [
    //     'kategori_kode',
    //     'deskripsi'
    // ];
}
