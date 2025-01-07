<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPola extends Model
{
    use HasFactory;

    protected $table = 'tarif_pola';
    protected $primaryKey = 'tarif_id';
    public $timestamps = true;

    protected $fillable = [
        'pilihan_id',
        'nama_tarif',
        'durasi',
        'tarif',
    ];

    // Relasi ke tabel `pola_acara`
    public function polaAcara()
    {
        return $this->belongsTo(PolaAcara::class, 'pilihan_id', 'pilihan_id');
    }
}
