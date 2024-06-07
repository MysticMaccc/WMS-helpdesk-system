<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positions extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $fillable = ['hash', 'name', 'is_active', 'modified_by'];

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

    public static function createData($data){
        return static::create($data);
    }

    public static function getAllPositions(){
        return static::where('is_active', 1)->paginate(10);
    }

    public static function getPositionByHash($hash){
        return static::where('hash', $hash)->first();
    }

    public static function updateData($hash, $data){
        session()->flash('success', 'Updating data successful!');
        return static::where('hash', $hash)->update($data);
    }

    public static function deleteData($id){
        return static::find($id)->update(['is_active' => 0]);
    }
}
