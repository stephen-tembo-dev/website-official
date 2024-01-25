<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramsContent extends Model
{
    use HasFactory;

    protected $table = 'home_programs_content';

    protected $fillable = [
        'image_path',
        'title',
        'url',
    ];
}
