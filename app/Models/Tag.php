<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 *
 * Class Tag
 * @package App\Models
 */
class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;
}
