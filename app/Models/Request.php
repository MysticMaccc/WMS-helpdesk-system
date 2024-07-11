<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'department_id',
        'request_type_id',
        'user_id',
        'assigned_user_id',
        'hash',
        'reference_number',
        'details',
        'cost',
        'is_active',
        'modified_by',
        'status_id'
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
    }

    // relationship
    public function request_detail()
    {
        return $this->hasMany(RequestDetail::class, 'reference_number', 'reference_number');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'reference_number');
    }

    public function status()
    {
        return $this->belongsTo(RequestTypeStatus::class, 'status_id');
    }

    public function request_type()
    {
        return $this->belongsTo(RequestType::class, 'request_type_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function request_update_log()
    {
        return $this->hasMany(RequestUpdateLog::class, 'request_id', 'id');
    }


    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class, 'description', 'reference_number');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ACCESSOR

}
