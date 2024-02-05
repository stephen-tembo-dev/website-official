<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'author',
        'year'
    ];

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like',  "%{$searchTerm}%");
    }
}
