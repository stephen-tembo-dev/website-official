<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text'
    ];
}
