<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'about_banners';

    protected $fillable = [
        'image_path',
        'title',
        'caption'
    ];
}
