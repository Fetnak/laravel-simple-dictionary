<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where('name', 'LIKE', '%' . $search . '%'));
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function words()
    {
        return $this->hasMany(Word::class, 'dictionaryID', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}
