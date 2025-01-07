<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolaAcara extends Model
{
    use HasFactory;

    protected $table = 'pola_acara';
    protected $primaryKey = 'pilihan_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_pola',
        'stasiun_id',
        'kerjasama_id',
        'kategori_id',
        'tarif_pola',
        'durasi',
        'video_sample',
        'status',
    ];

    // Relasi ke tabel `stasiun`
    public function stasiun()
    {
        return $this->belongsTo(Stasiun::class, 'stasiun_id', 'stasiun_id');
    }

    // Relasi ke tabel `kerjasama`
    public function kerjasama()
    {
        return $this->belongsTo(Kerjasama::class, 'kerjasama_id', 'kerjasama_id');
    }

    // Relasi ke tabel `kategori_acara`
    public function kategoriAcara()
    {
        return $this->belongsTo(KategoriAcara::class, 'kategori_id', 'kategori_id');
    }

    // Relasi ke tabel `favorit`
    public function favorit()
    {
        return $this->hasMany(Favorit::class, 'pilihan_id', 'pilihan_id');
    }

    // Relasi ke tabel `tarif_pola`
    public function tarifPola()
    {
        return $this->hasOne(TarifPola::class, 'pilihan_id', 'pilihan_id');
    }
}
