<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'supplier_kode',
        'supplier_nama',
        'supplier_alamat',
    ];

    // protected $fillable = [
    //     'supplier_kode',
    //     'supplier_alamat',
    // ];
}
