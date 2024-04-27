<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // relationship
    public function request_type()
    {
        return $this->belongsTo(RequestType::class,'category_id');
    }
}
