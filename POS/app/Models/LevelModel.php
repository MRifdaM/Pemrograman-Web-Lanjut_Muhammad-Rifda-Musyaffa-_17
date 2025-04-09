<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    //=========================================Jobsheet 4 Praktikum 2.7=======================================
    public function user(): HasMany {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
