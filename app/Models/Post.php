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

    public function scopeTitleOrContent(Builder $query, string|null $search): QueryBuilder | Builder
    {
        return $query->where('title', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%");
    }

    public function scopeSortBy(Builder $query, string $key): QueryBuilder | Builder
    {
        $possibleKeys = ['all', 'newest', 'oldest', 'title-za', 'title-az', 'views-most', 'views-least', 'comments-most', 'comments-least'];

        if (!in_array($key, $possibleKeys)) {
            return $query;
        }

        switch ($key) {
            case 'newest':
                return $query->latest();
            case 'oldest':
                return $query->oldest();
            case 'title-za':
                return $query->orderBy('title', 'desc');
            case 'title-az':
                return $query->orderBy('title', 'asc');
            case 'views-most':
                return $query->withCount('views')->orderBy('views_count', 'desc');
            case 'views-least':
                return $query->withCount('views')->orderBy('views_count', 'asc');
            case 'comments-most':
                return $query->withCount('comments')->orderBy('comments_count', 'desc');
            case 'comments-least':
                return $query->withCount('comments')->orderBy('comments_count', 'asc');
            default:
                return $query;
        }
    }
}
