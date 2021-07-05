<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Model
 * @property string $classRole
 * @property string $role
 * @property integer $role_id
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;
    const ROLE_USER = 3;

    const ROLES = [
        self::ROLE_ADMIN  => 'Admin',
        self::ROLE_CLIENT => 'Client',
        self::ROLE_USER   => 'User',
    ];

    const ROLES_CLASSES = [
        self::ROLE_ADMIN  => 'bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs',
        self::ROLE_CLIENT => 'bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs',
        self::ROLE_USER   => 'bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin(): bool
    {
        return $this->role_id == self::ROLE_ADMIN;
    }

    public function getRoleAttribute(): string
    {
        return self::ROLES[$this->role_id] ?? 'User';
    }

    public function getClassRoleAttribute(): string
    {

    }
}
