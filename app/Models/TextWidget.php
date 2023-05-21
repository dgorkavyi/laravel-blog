<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'key',
        'image', 'content',
        'active',
    ];

    public function getImage(): string
    {
        return str_starts_with($this->thumbnail, 'http') ? $this->image : "/storage/{$this->image}";
    }
    static public function getTitle(string $key): string
    {
        $widget = Cache::get("text-widget-$key", function () use ($key) {
            return TextWidget::query()->where('key', '=', $key)->where('active', '=', 1)->first();
        });

        return $widget ? $widget->title : '';
    }
    static public function getContent(string $key): string
    {
        $widget = Cache::get("text-widget-$key", function () use ($key) {
            return TextWidget::query()->where('key', '=', $key)->where('active', '=', 1)->first();
        });
        return $widget ? $widget->content : '';
    }
}
