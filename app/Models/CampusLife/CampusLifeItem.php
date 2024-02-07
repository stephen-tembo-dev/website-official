<?php

namespace App\Models\CampusLife;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusLifeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'type',
        'image_path'
    ];
}
