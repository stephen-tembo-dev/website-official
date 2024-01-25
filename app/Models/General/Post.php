<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'image_path',
        'title',
        'text',
        'status',
        'video_url',
        'attachment_path',
        'published_at'
    ];
}
