<?php

namespace App\Models\Admissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = ['entry_requirements', 'acommodation', 'fees_and_scholarships', 'how_to_apply', 'category'];
}
