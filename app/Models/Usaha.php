<?php

namespace App\Models;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usaha extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'detail_usaha';
    protected $primarykey = 'id';
    protected $fillable = [
        
        'nama_usaha',
        'deskripsi',
        'dana',
        'gambar',
        'dana_terkumpul',
        'created_at',
        'updated_at',
        'id_investor'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     public function usaha(){
        return $this->belongsTo(User::class, 'id_mitra');
    }
    public function usaha2(){
        return $this->belongsTo(User::class, 'id_investor');
    }
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_mitra', 'id');
    }
    // public function payment(): HasMany
    // {
    //     return $this->hasMany(Pembayaran::class, 'id_mitra', 'id');
    // }
    
}
