<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'title',
        'text',
        'venue',
        'date',
        'time',
        'attachment_path',
    ];
}
