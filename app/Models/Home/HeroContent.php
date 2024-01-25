<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroContent extends Model
{
    use HasFactory;

    protected $table = 'home_hero_content';

    protected $fillable = [
        'title',
        'image_path',
        'text',
        'cta_text',
        'cta_url',
    ];
}
