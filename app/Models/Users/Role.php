<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'role_name'];

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
