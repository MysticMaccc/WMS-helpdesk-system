<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTypeStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'hash', 'name', 'is_active', 'modified_by'
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
    public function request()
    {
        return $this->hasOne(Request::class, 'status_id');
    }

    public function request_type_approver()
    {
        return $this->hasOne(RequestTypeApprover::class, 'request_type_status_id');
    }
}
