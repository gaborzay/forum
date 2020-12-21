<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Thread
 * @package App\Models
 * @property integer id
 * @property integer user_id
 * @property string title
 * @property string body
 * @property DateTimeInterface created_at
 * @property DateTimeInterface updated_at
 * @property Collection $replies
 */
class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

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
        return $this->hasMany(Reply::class, 'thread_id');
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $reply
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
