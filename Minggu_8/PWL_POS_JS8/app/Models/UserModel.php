<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

class UserModel extends Authenticatable
{
    use HasFactory;


    //=================================================================Jobsheet 3============================================================
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


    //=================================================================Jobsheet 4============================================================
    //Menambahkan variabel $fillable untuk mendaftarkan atribut (nama kolom) yang bisa diisi ketika melakukan insert atau update ke database.
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    //Menghilangkan kolom password pada variabel $fillable, menandakan variabel password tidak bisa diisi ketika melakukan insert atau update ke database.
    // protected $fillable = ['level_id', 'username', 'nama'];

    //================================================================Jobsheet 7============================================================
    protected $hidden = ['password']; // jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash

    public function level(): BelongsTo //Menunjukkan bahwa setiap user memiliki relasi belongsTo dengan tabel LevelModel, dihubungkan melalui level_id.
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function getRoleName(): string {
        return $this->level->level_nama;
    }

    public function hasRole(string $role): bool {
        return $this->level->level_kode == $role;
    }

    public function getRole(){
        return $this->level->level_kode;
    }

    public function stok(): HasMany {
        return $this->hasMany(StokModel::class, 'user_id', 'user_id');
    }

    public function penjualan(): HasMany {
        return $this->hasMany(PenjualanModel::class, 'user_id', 'user_id');
    }
}
