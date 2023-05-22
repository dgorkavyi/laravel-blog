<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'user_id',
        'thumbnail', 'content',
        'active', 'published_at',
        'meta_title', 'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedDate(): string
    {
        return $this->published_at->format('H:i (d M Y)');
    }
    public function getPostItemContent(): string
    {
        return Str::limit($this->content, 300);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getThumbnail(): string
    {
        return str_starts_with($this->thumbnail, 'http') ? $this->thumbnail : "/storage/{$this->thumbnail}";
    }
}
