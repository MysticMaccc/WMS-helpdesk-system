<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTypeApprover extends Model
{
    use HasFactory;

    // relationship
    public function request_type_status()
    {
        return $this->hasOne(RequestTypeStatus::class,'request_type_status_id');
    }

    public function request_type_approver()
    {
        return $this->belongsTo(Request::class , 'request_type_id');
    }
}
