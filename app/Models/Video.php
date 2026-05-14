<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'file_path'];

    public function requests()
    {
        return $this->hasMany(VideoRequest::class);
    }
}
