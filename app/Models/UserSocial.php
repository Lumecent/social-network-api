<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $user_id
 * @property string $social
 * @property string $url
 *
 * Class UserSocial
 * @package App\Models
 */
class UserSocial extends Model
{
    use HasFactory;

    public $table = 'users_socials';
    public $timestamps = false;

    protected $fillable = [
        'social',
        'url'
    ];
}
