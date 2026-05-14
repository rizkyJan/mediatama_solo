<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoRequest extends Model
{
    protected $fillable = ['video_id', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function videoRequests()
    {
        return $this->hasMany(VideoRequest::class);
    }

    public function videoPermissions()
    {
        return $this->hasOne(VideoPermission::class);
    }
}
