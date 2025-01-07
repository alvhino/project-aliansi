<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_role',
        'level',
        'deskripsi',
        'status',
    ];

    // Relasi ke tabel `user`
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}
