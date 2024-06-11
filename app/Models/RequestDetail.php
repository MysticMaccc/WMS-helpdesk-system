<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    use HasFactory;
    protected $fillable = ['reference_number','details','cost','is_active'];

    // relationship
    public function request()
    {
        return $this->belongsTo(Request::class,'reference_number','reference_number');
    }

}
