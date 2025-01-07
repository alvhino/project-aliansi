<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'judul',
        'isi_pesan',
        'respon_admin',
        'status',
    ];

    // Relasi ke tabel `user`
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
