<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RequestType extends Model
{
    use HasFactory;
    protected $fillable = ['name','department_id', 'category_id', 'hash', 'is_active', 'modified_by'];

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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function request_type_approver()
    {
        return $this->hasMany(RequestTypeApprover::class, 'request_type_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function request()
    {
        return $this->hasMany(Request::class,'request_type_id','id');
    }

    // scope
    public function scopeIsActive($query)
    {
            $query->where('is_active',1);
    }

}
