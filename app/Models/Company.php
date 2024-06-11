<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'hash',
        'name',
        'max_user',
        'modified_by'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $data = $model::orderBy('id', 'DESC')->first();
            $hash_id = $data != NULL ? encrypt($data->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->modified_by = Auth::user()->full_name;
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::user()->full_name;
        });
    }

    public function request()
    {
        return $this->hasMany(Request::class,'company_id');
    }

    public function user()
    {
        return $this->hasMany(User::class,'company_id');
    }

    public function request_type()
    {
        return $this->hasMany(RequestType::class,'company_id');
    }

}
