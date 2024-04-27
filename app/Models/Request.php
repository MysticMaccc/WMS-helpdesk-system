<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    // relationship
    public function attachment()
    {
        return $this->hasMany(Attachment::class,'request_id');
    }

    public function status_id()
    {
        return $this->hasOne(RequestTypeStatus::class, 'status_id');
    }
}
