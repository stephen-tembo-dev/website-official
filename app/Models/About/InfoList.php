<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoList extends Model
{
    use HasFactory;

    protected $table = 'about_info_list';

    protected $fillable = [
        'title',
        'text'
    ];
}
