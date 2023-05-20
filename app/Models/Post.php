<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'user_id',
        'thumbnail', 'content',
        'active', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedDate()
    {
        return $this->published_at->format('H:i (d M Y)');
    }

    public function categories(): BelongsToMany
    {
        // dd($this->belongsToMany(Category::class)->get());
        return $this->belongsToMany(Category::class);
    }
}
