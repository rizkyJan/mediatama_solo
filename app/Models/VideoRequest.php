<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoRequest extends Model
{
    // Mengizinkan mass assignment untuk kolom-kolom ini
    protected $fillable = ['user_id', 'video_id', 'status'];

    // Relasi ke tabel users (Customer yang request)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel videos (Video yang direquest)
    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    // Relasi ke tabel video_permissions (Waktu kedaluwarsa yang diatur admin)
    public function permission()
    {
        return $this->hasOne(VideoPermission::class);
    }
}
