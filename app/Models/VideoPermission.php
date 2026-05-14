<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoPermission extends Model
{
    protected $fillable = ['video_request_id', 'expired_at'];

    protected $casts = [
        'expired_at' => 'date_time',
    ];

    public function videoRequest()
    {
        return $this->belongsTo(VideoRequest::class);
    }
}
