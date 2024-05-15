<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubService extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the SubService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get all of the comments for the SubService
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sup_services(): HasMany
    {
        return $this->hasMany(SupService::class);
    }
}
