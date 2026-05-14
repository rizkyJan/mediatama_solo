<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoPermission extends Model
{
    protected $fillable = ['video_request_id', 'expired_at'];

    // Memberitahu Laravel bahwa expired_at adalah format tanggal/waktu (Carbon)
    protected $casts = [
        'expired_at' => 'datetime',
    ];

    public function request()
    {
        return $this->belongsTo(VideoRequest::class, 'video_request_id');
    }
}
