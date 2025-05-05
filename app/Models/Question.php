<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = ['text'];

    // Relationship to get all the answers belonging to the question
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
