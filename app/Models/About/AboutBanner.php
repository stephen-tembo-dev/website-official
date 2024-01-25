<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'caption'
    ];
}
