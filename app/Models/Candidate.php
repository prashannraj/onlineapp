<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(vacancy::class);
    }

    /**
     * The roles that belong to the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quatas(): BelongsToMany
    {
        return $this->belongsToMany(Quata::class);
    }

    /**
     * Get the detail associated with the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(Detail::class);
    }
}
