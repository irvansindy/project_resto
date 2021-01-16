<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Kasir extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'kasir';

    protected $fillable = [
        'nama_kasir',
    ];

    protected $hidden = [];
}
