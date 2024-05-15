<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupService extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the SupService
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the user that owns the SupService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sub_service(): BelongsTo
    {
        return $this->belongsTo(SubService::class);
    }
}
