<?php

namespace App\Models;

use App\Interfaces\HasRoleInterface;
use Carbon\Carbon;
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
 * @property Carbon $created_at
 * @property string $email
 * @property int $id
 * @property string $name
 * @property string $slashesName
 * @property string $role
 * @property integer $role_id
 */
class User extends Authenticatable implements HasRoleInterface
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $perPage = 10;

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

    public function getSlashesNameAttribute(): string
    {
        return addslashes($this->name);
    }

    public function hasRole(string $role): bool
    {
        return match ($role) {
            'admin' => $this->role_id == self::ROLE_ADMIN,
            'client' => $this->role_id == self::ROLE_CLIENT,
            'user' => $this->role_id == self::ROLE_USER,
        };
    }
}
