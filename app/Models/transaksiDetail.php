<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksiDetail extends Model
{   
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transaksi_detail';

    protected $fillable = [
        'id_produk', 'id_tempat', 'harga_produk', 'qty'
    ];

    protected $hidden = [];

    public function transaksiMaster()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
