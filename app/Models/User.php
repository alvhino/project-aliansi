<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'username',
        'foto_profil',
        'status',
        'role_id',
    ];

    // Relasi ke tabel `role`
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Relasi ke tabel `feedback`
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id', 'user_id');
    }

    // Relasi ke tabel `cart`
    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'user_id');
    }
}
