<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory; // Menggunakan trait HasFactory yang disediakan oleh Laravel. Trait ini memudahkan pembuatan instance model menggunakan factory, terutama berguna untuk testing dan seeding data.

    //array yang menentukan atribut atau kolom mana saja yang boleh diisi
    protected $fillable = [
        'title',
        'author',
        'year_of_publication',
        'price',
        'stock',
        'description',
    ];
}
