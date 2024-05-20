<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positions extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $fillable = ['hash', 'name', 'is_active', 'modified_by'];

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
        return static::where('hash', $hash)->update($data);
    }

    public static function deleteData($id){
        return static::find($id)->update(['is_active' => 0]);
    }
}
