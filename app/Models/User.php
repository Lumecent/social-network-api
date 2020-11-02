<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $alias
 * @property string $avatar
 * @property string $cover
 * @property string $info
 * @property string $date_bd
 * @property integer $socials
 * @property integer $friends
 * @property integer $followers
 * @property integer $follows
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alias',
        'avatar',
        'cover',
        'info',
        'date_bd'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'password',
        'remember_token',
        'updated_at',
    ];

    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }
}
