<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    // relationship
    public function request()
    {
        return $this->belongsTo(Request::class,'request_id');
    }
}
