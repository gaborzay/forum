<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Reply
 * @package App\Models
 * @property integer id
 * @property integer thread_id
 * @property integer user_id
 * @property string body
 * @property DateTimeInterface created_at
 * @property DateTimeInterface updated_at
 * @property User owner
 */
class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
