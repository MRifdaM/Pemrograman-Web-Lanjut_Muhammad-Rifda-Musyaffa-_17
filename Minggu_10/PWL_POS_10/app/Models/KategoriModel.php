<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    //=========================================Jobsheet 4 Praktikum 2.7=======================================
    public function barang(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'kategori_id', 'kategori_id');
    }
}
