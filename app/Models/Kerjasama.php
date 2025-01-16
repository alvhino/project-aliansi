<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{ 
    use HasFactory;

    protected $table = 'kerjasama';
    protected $primaryKey = 'kerjasama_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_kerjasama',
        'deskripsi',
        'icon',
        'status',
    ];

    // Relasi ke tabel `pola_acara`
    public function polaAcara()
    {
        return $this->hasMany(PolaAcara::class, 'kerjasama_id', 'kerjasama_id');
    }
}
