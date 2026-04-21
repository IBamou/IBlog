<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str as SupportStr;
use Psy\Util\Str;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'status', 'category_id', 'user_id'];

    protected static function newFactory(): ArticleFactory
    {
        return ArticleFactory::new();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function readingTime(): string
    {
        return SupportStr::readingTime($this->content);
    }
}
