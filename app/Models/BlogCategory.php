<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 *
 * Class BlogCategory
 * @package App\Models
 */
class BlogCategory extends Model
{
    use HasFactory;

    public $table = 'blogs_categories';
    public $timestamps = false;
}
