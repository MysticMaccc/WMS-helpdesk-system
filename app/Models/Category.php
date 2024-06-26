<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['hash', 'name', 'is_active', 'modified_by'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastId = $model::orderBy('id', 'DESC')->first();
            $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->company_id = Auth::user()->company_id;
            $model->modified_by = 'system';
        });

        static::updating(function ($model) {
            $model->modified_by = 'system';
        });
    }

    // relationship
    public function request_type()
    {
        return $this->belongsTo(RequestType::class, 'category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
