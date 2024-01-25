<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainContent extends Model
{
    use HasFactory;

    protected $table = 'about_main_content';

    protected $fillable = [
        'title',
        'text'
    ];
}
