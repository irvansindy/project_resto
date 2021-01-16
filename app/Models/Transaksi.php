<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tempat;

class Transaksi extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'transaksi_master';

    protected $fillable = [
        'uuid', 'id_kasir', 'id_tempat', 'no_telepon', 'total_transaksi', 'status'
    ];

    public function transaksi_detail()
    {
        return $this->hasMany(transaksiDetail::class, 'id_transaksi');
    }

    public function tempat()
    {
        return $this->belongsTo(Tempat::class, 'id_tempat', 'id');
    }

}