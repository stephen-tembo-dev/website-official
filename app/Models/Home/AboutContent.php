<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;

    protected $table = 'home_about_content';

    protected $fillable = [
        'image_path',
        'title',
        'text',
        'video_url'
    ];
}
