<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
