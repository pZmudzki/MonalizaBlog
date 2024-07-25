<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'visit_id', 'content', 'starred'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
