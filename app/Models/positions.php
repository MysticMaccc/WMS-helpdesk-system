<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class positions extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $fillable = ['hash', 'name', 'is_active', 'company_id', 'modified_by'];

    public static function boot()
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

    public static function createData($data)
    {
        return static::create($data);
    }

    public static function getAllPositions()
    {
        $query = static::where('is_active', 1);
        if (Auth::user()->user_type_id != 1) {
            $query->where('company_id', Auth::user()->company_id);
        }
        $data = $query->paginate(10);
        return $data;
    }

    public static function getPositionByHash($hash)
    {
        return static::where('hash', $hash)->first();
    }

    public static function updateData($hash, $data)
    {
        session()->flash('success', 'Updating data successful!');
        return static::where('hash', $hash)->update($data);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public static function deleteData($id)
    {
        return static::find($id)->update(['is_active' => 0]);
    }
}
