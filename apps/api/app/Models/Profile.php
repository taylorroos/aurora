<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'display_name',
        'bio',
    ];
    
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}