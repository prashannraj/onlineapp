<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Vacancy extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Vacancy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

                                    
    /**
     * The roles that belong to the Vacancy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function candidates(): BelongsToMany
    {
        return $this->belongsToMany(Candidate::class);
    }
}
