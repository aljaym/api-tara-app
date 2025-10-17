<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Feed extends Model
{
    protected $fillable = [
        'user_id',
        'feedable_id',
        'feedable_type',
        'action_type',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    // Action types
    const ACTION_CREATED_POST = 'created_post';
    const ACTION_CREATED_EVENT = 'created_event';
    const ACTION_JOINED_EVENT = 'joined_event';
    const ACTION_LIKED_POST = 'liked_post';
    const ACTION_COMMENTED_POST = 'commented_post';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feedable(): MorphTo
    {
        return $this->morphTo();
    }

    // Helper methods
    public function isPost(): bool
    {
        return $this->feedable_type === Post::class;
    }

    public function isEvent(): bool
    {
        return $this->feedable_type === Event::class;
    }
}
