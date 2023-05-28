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
        'jenis_pembayaran',
        'jumlah_pembayaran',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function mitra(){
        return $this->belongsTo(Usaha::class, 'id_mitra');
    }
}
