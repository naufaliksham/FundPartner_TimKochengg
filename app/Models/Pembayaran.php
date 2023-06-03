<?php

namespace App\Models;

use App\Models\Usaha;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_mitra',
        'jenis_pembayaran',
        'jumlah_pembayaran',
        'status',
        'tanggal_jatuh_tempo',
        'created_at',
        'updated_at'
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Usaha::class, 'id_mitra');
    }
    
}
