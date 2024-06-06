<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id',
        'position_id',
        'user_type_id',
        'hash',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'is_active',
        'modified_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relationships
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user_type()
    {
        return $this->belongsTo(User::class, 'user_type_id');
    }

    public function user_role()
    {
        return $this->hasMany(UserRole::class, 'user_id');
    }

    public function request_type_approver()
    {
        return $this->hasMany(RequestTypeApprover::class, 'user_id', 'id');
    }

    public function request_assigned_to()
    {
        return $this->hasMany(Request::class, 'assigned_user_id');
    }

    public function request()
    {
        return $this->hasMany(Request::class, 'user_id');
    }

    // accessor
    public function getFullNameAttribute()
    {
        return $this->firstname . " " . $this->middlename . " " . $this->lastname;
    }

    public function getNameAttribute()
    {
        return strtoupper($this->firstname) . " " . strtoupper($this->middlename) . " " . strtoupper($this->lastname);
    }
}
