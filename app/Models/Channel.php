<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string slug
 * @property DateTimeInterface created_at
 * @property DateTimeInterface updated_at
 */
class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];
}
