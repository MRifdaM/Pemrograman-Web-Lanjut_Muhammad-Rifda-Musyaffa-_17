<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;


    //=================================================================Jobsheet 3============================================================
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


    //=================================================================Jobsheet 4============================================================
    //Menambahkan variabel $fillable untuk mendaftarkan atribut (nama kolom) yang bisa diisi ketika melakukan insert atau update ke database.
    // protected $fillable = ['level_id', 'username', 'nama', 'password'];

    //Menghilangkan kolom password pada variabel $fillable, menandakan variabel password tidak bisa diisi ketika melakukan insert atau update ke database.
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo //Menunjukkan bahwa setiap user memiliki relasi belongsTo dengan tabel LevelModel, dihubungkan melalui level_id.
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
