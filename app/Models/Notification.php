<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'hash',
        'for_user',
        'title',
        'description',
        'url',
        'parameter',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastId = $model::orderBy('id', 'DESC')->first();
            $hash_id = $lastId != NULL ? encrypt($lastId->id + 1) : encrypt(1);
            $model->hash = $hash_id;
        });
    }

    // relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'for_user', 'id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'description', 'reference_number');
    }
}
