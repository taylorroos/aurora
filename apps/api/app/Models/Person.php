<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    protected $guarded = [];
    
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function relationships(): BelongsToMany
    {
        return $this->belongsToMany(Relationship::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}