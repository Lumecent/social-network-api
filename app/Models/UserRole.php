<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 *
 * Class UserRoleRepository
 * @package App\Models
 */
class UserRole extends Model
{
    use HasFactory;

    public $table = 'users_roles';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
