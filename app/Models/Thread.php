<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Thread
 * @package App\Models
 * @property integer id
 * @property string title
 */
class Thread extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    public function path(): string
    {
        return '/threads/'.$this->id;
    }

    /**
     * @return HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
