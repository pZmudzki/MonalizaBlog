<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public static array $types = ['wierszem_pisane', 'scenariusze_pisane_życiem', 'z_medycznego_punktu_widzenia', 'taniec'];

    protected $fillable = ['title', 'content', 'type', 'archived'];

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function scopeType(Builder $query, string|null $type): QueryBuilder | Builder
    {
        if (!in_array($type, self::$types)) {
            return $query;
        }

        return $query->where('type', '=', $type);
    }
}
