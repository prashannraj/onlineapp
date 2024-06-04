<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class detail extends Model
{
    use HasFactory;
    /**
     * Get the candidaet that owns the detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Get all of the education for the detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Get all of the comments for the detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tranings(): HasMany
    {
        return $this->hasMany(Traning::class);
    }

    /**
     * Get all of the experiences for the detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
