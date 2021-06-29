<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Tempat;
use App\Models\transaksiDetail;
class Transaksi extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'transaksi_master';

    protected $fillable = [
        'uuid', 'id_kasir', 'id_tempat', 'nama_pelanggan', 'total_transaksi', 'status'
    ];

    protected $hidden = [];

    public function transaksi_detail()
    {
        return $this->hasMany(transaksiDetail::class, 'id_transaksi');
        // return $this->belongsTo(transaksiDetail::class, 'id_transaksi', 'id');
    }

    public function tempat()
    {
        return $this->belongsTo(Tempat::class, 'id_tempat', 'id');
    }

}