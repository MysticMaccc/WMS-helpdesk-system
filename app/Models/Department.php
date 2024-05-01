<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // relationships
    public function user()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function request_type()
    {
        return $this->hasMany(RequestType::class,'department_id');
    }
}
