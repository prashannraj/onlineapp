<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegisterForm extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the RegisterForm
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }
}
