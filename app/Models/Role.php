<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['hash', 'name', 'is_active', 'modified_by'];

    // relationships
    public function user_role()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
