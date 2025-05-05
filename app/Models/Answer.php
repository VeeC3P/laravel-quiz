<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = ['question_id', 'text', 'score'];

    // Relationship to get the belonging question for my answers
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}

