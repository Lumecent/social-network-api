<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 *
 * Class Access
 * @package App\Models
 */
class Access extends Model
{
    use HasFactory;

    public $timestamps = false;
}
