<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'latitude',
        'longitude',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'category',
        'image_url',
        'max_attendees',
        'price',
        'is_live',
        'is_active',
        'itinerary',
        'requirements',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'price' => 'decimal:2',
        'is_live' => 'boolean',
        'is_active' => 'boolean',
        'itinerary' => 'array',
        'requirements' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getAttendeesCountAttribute(): int
    {
        return $this->bookings()->where('status', 'confirmed')->sum('attendees_count');
    }

    public function getAvailableSlotsAttribute(): int
    {
        return max(0, $this->max_attendees - $this->attendees_count);
    }

    public function isFullyBooked(): bool
    {
        return $this->available_slots <= 0;
    }
}
