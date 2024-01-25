<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAboutContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'text',
        'video_url'
    ];
}
