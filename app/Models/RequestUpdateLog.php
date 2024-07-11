<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RequestUpdateLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'hash',
        'request_id',
        'status_id',
        'modified_by'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastId = $model::orderBy('id', 'DESC')->first();
            $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->modified_by = Auth::user()->full_name;
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::user()->full_name;
        });
    }

    // relationships
    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(RequestTypeStatus::class, 'status_id');
    }
}
