<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'barang_stok',
        'harga_beli',
        'harga_jual',
    ];

    // protected $fillable = [
    //     'kategori_id',
    //     'barang_kode',
    //     'barang_nama',
    //     'harga_jual',
    // ];

    //=========================================Jobsheet 4 Praktikum 2.7=======================================
    public function kategori(): BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    public function stok(): HasMany {
        return $this->hasMany(StokModel::class, 'barang_id', 'barang_id');
    }

    public function penjualanDetail(): HasMany {
        return $this->hasMany(PenjualanDetailModel::class, 'barang_id', 'barang_id');
    }
}
