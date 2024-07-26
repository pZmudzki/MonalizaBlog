<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'filename', 'filepath', 'source'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
