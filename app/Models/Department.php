<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'hash', 'name', 'is_active', 'modified_by'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastId = $model::orderBy('id', 'DESC')->first();
            $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->is_active = 1;
            $model->modified_by = 'system';
        });

        static::updating(function ($model) {
            $model->modified_by = 'system';
        });
    }
    // relationships
    public function user()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function assigned_user_department()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function request_type()
    {
        return $this->hasMany(RequestType::class, 'department_id');
    }
}
