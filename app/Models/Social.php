<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $regex
 *
 * Class Social
 * @package App\Models
 */
class Social extends Model
{
    use HasFactory;

    public $timestamps = false;
}
