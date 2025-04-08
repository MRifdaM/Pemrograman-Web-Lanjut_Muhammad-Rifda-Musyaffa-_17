<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    //==========================================Jobsheet 3 Praktikum 6=======================================
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    //==========================================Jobsheet 4 Praktikum 1=======================================
    protected $fillable = [
        'level_kode',
        'level_nama'
    ];

    // protected $fillable = [
    //     'level_kode'
    // ];
}
