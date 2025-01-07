<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'tarif_id',
    ];

    // Relasi ke tabel `user`
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relasi ke tabel `tarif_pola`
    public function tarifPola()
    {
        return $this->belongsTo(TarifPola::class, 'tarif_id', 'tarif_id');
    }
}
