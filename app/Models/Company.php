<?php

namespace App\Models;

use Carbon\Carbon;
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
        'is_active',
        'modified_by',
        'is_subscribed',
        'subscribed_at',
        'expired_at',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $data = $model::orderBy('id', 'DESC')->first();
            $hash_id = $data != NULL ? encrypt($data->id + 1) : encrypt(1);
            $model->hash = $hash_id;
            $model->modified_by = Auth::user()->full_name;
            $model->subscribed_at = Carbon::now();
            $model->expired_at = Carbon::now()->addMonths(6);
        });

        static::updating(function ($model) {
            $model->modified_by = Auth::user()->full_name;
        });
    }

    public function request()
    {
        return $this->hasMany(Request::class, 'company_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function request_type()
    {
        return $this->hasMany(RequestType::class, 'company_id');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'company_id');
    }

    public function department()
    {
        return $this->hasMany(Department::class, 'company_id');
    }

    public function position()
    {
        return $this->hasMany(Position::class, 'company_id');
    }

    // ACESSOR
    public function getSubscriptionAttribute()
    {
        return $this->is_subscribed ? 'Yes' : 'No';
    }
}
