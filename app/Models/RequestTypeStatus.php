<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTypeStatus extends Model
{
    use HasFactory;

    // relationship
    public function request()
    {
        return $this->hasOne(Request::class, 'status_id');
    }

    public function request_type_approver()
    {
        return $this->hasOne(RequestTypeApprover::class,'request_type_status_id');
    }
}
