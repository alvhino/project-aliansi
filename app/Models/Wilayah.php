<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';
    protected $primaryKey = 'wilayah_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_wilayah',
    ];

    // Relasi ke tabel `stasiun`
    public function stasiuns()
    {
        return $this->hasMany(Stasiun::class, 'wilayah_id', 'wilayah_id');
    }
}
