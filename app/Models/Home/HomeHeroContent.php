<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeroContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'text',
        'cta_text',
        'cta_url',
    ];
}
