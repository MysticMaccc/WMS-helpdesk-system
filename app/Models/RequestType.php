<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    use HasFactory;

    // relationship
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function request_type_approver()
    {
        return $this->hasMany(RequestTypeApprover::class , 'request_type_id');
    }
}
