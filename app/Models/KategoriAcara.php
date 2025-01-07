<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAcara extends Model
{
    use HasFactory;

    protected $table = 'kategori_acara';
    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'nama_kategori',
        'status',
    ];

    // Relasi ke tabel `pola_acara`
    public function polaAcara()
    {
        return $this->hasMany(PolaAcara::class, 'kategori_id', 'kategori_id');
    }
}
