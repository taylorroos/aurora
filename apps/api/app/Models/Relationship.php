<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Relationship extends Model
{
    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    public function memories(): HasMany
    {
        return $this->hasMany(Memory::class);
    }
}