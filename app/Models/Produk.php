<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'slug',
        'deskripsi',
        'foto',
        'jenis',
        'harga',
    ];

    protected $hidden = [];

    public function getPhotoAttribute($value){
        return url('storage/'.$value);
    }
}
