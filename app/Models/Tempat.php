<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tempat extends Model
{
    use softDeletes;
    use HasFactory;

    protected $table = 'tempat';

    protected $fillable = [
        'nama_tempat',
        'qr_code',
    ];

    protected $hidden = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_tempat');
    }

}
