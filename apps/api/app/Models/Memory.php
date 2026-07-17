<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Memory extends Model
{
    protected $fillable = [
        'content',
    ];

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class);
    }
}