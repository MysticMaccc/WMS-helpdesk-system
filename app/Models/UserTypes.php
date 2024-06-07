<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    use HasFactory;
    protected $table = 'user_types';
    protected $fillable = ['hash', 'name', 'modified_by', 'is_active'];

    public static function boot(){
        parent::boot();
        static::creating(function($model){
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
}
