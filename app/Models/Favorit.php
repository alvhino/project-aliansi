<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $table = 'favorit';
    protected $primaryKey = 'favorit_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'pilihan_id',
    ];

    // Relasi ke tabel `user`
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relasi ke tabel `pola_acara`
    public function polaAcara()
    {
        return $this->belongsTo(PolaAcara::class, 'pilihan_id', 'pilihan_id');
    }
}
