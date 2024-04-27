<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // relationships
    public function user_role()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
