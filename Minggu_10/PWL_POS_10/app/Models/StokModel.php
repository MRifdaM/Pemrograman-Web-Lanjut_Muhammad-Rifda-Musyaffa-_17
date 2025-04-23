<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'stok_tanggal',
        'stok_jumlah'
    ];

    // protected $fillable = [
    //     'barang_id',
    //     'user_id',
    //     'supplier_id',
    //     'stok_jumlah'
    // ];

    //=========================================Jobsheet 4 Praktikum 2.7=======================================
    public function barang(): BelongsTo {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function supplier(): BelongsTo {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    }
}
