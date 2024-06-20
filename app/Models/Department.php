<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'hash', 'name', 'is_active', 'modified_by'];

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

    // static methods
    public static function getAllDepartment($search)
    {
        $query = static::where('is_active', 1)->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        });

        if (Auth::user()->user_type_id != 1) {
            $query->where('company_id', Auth::user()->company_id);
        }

        $departmentData = $query->orderBy('name', 'asc')->paginate(7);
        return $departmentData;
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

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
