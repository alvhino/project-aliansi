<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    public $timestamps = true;

    protected $fillable = [
        'cart_id',
        'no_tiket',
        'status',
    ];

    // Relasi ke tabel `cart`
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    // Relasi ke tabel `status`
    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'status_id');
    }
}
