<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 *
 * Class RoleRepository
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
}
