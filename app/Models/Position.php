<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    // relationships
    public function user()
    {
        return $this->hasMany(User::class, 'position_id');
    }
}
