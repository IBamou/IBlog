<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Str::macro('readingTime', function ($text, $wpm = 200) {
            // Count words (Unicode-safe: Arabic, French, etc.)
            $wordCount = preg_match_all('/\p{L}+/u', $text);

            // Calculate minutes
            $minutes = ceil($wordCount / $wpm);

            // Optional: handle very short texts
            return $minutes;
        });
    }

}
