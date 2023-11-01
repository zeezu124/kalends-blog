<?php

namespace App\Models;

use App\Enums\UserType;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;


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

    protected $casts = [
        'date_of_birth' => 'datetime:Y-m-d',
        'user_type' => UserType::class,
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
