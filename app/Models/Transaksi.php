<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primarykey = 'id';
    protected $fillable =[
        'id',
        'id_user',
        'id_mitra',
        'id_pembayaran',
        'jenis_pembayaran',
        'jumlah_pembayaran', //isi dengan lunas atau cicil
        'denda',
        'fee',
        'total',
        'waktu_pembayaran'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function mitra(){
        return $this->belongsTo(Usaha::class, 'id_mitra');
    }
  
}
