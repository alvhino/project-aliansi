<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;

    protected $table = 'stasiun';
    protected $primaryKey = 'stasiun_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_stasiun',
        'wilayah_id',
        'alamat',
        'telepon',
        'email',
        'status',
    ];

    // Relasi ke tabel `wilayah`
    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'wilayah_id');
    }

    // Relasi ke tabel `pola_acara`
    public function polaAcara()
    {
        return $this->hasMany(PolaAcara::class, 'stasiun_id', 'stasiun_id');
    }
}
