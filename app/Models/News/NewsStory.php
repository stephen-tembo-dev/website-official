<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'text',
        'video_url',
        'attachment_path',
    ];
}
