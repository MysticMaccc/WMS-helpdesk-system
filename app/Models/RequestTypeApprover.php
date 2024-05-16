<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTypeApprover extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_type_id', 'user_id', 'request_type_status_id', 'hash',
        'level', 'is_active', 'modified_by'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastId = $model::orderBy('id', 'DESC')->first();
            $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->modified_by = 'system';
        });

        static::updating(function ($model) {
            $model->modified_by = 'system';
        });
    }

    // relationship
    public function request_type_status()
    {
        return $this->belongsTo(RequestTypeStatus::class, 'request_type_status_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
