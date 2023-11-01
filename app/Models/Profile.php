<?php

namespace App\Models;

use App\Models\User;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    const STATUS_PUBLISHED = 'published';
    const STATUS_EDITED = 'edited';
    const STATUS_DELETED = 'deleted';

    const VALID_STATUSES = [
        self::STATUS_PUBLISHED,
        self::STATUS_EDITED,
        self::STATUS_DELETED,
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'date_of_birth',
        'image_url',
        'user_type',
    ];

    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the playlists for the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }
}
