<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMainContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text'
    ];
}
