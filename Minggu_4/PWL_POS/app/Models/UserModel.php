<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;


    //=================================================================Jobsheet 3============================================================
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


    //=================================================================Jobsheet 4============================================================
    //Menambahkan variabel $fillable untuk mendaftarkan atribut (nama kolom) yang bisa diisi ketika melakukan insert atau update ke database.
    protected $fillable = ['level_id', 'username', 'nama', 'password'];
}
