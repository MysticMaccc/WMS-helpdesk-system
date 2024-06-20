<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserType extends Model
{
    use HasFactory;
    protected $fillable = ['hash', 'name', 'is_active', 'modified_by'];

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $lastId = $model::orderBy('id', 'DESC')->first();
    //         $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
    //         $model->hash = $hash_id;
    //         $model->modified_by = Auth::user()->full_name;
    //     });

    //     static::updating(function ($model) {
    //         $model->modified_by = Auth::user()->full_name;
    //     });
    // }

    // relationships
    public function user()
    {
        return $this->hasMany(User::class, 'user_type_id');
    }
}
