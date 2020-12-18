<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thread
 * @package App\Models
 * @property integer id
 */
class Thread extends Model
{
    use HasFactory;

    public function path()
    {
        return '/threads/'.$this->id;
    }
}
