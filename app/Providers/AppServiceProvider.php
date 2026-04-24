<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Models\User;

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
        Gate::define('can-access', function (User $user, Article $article) {
            return $user->id === $article->user_id && $article->status === 'published';
        });


        Str::macro('readingTime', function ($text, $wpm = 200) {
            // Count words (Unicode-safe: Arabic, French, etc.)
            $wordCount = preg_match_all('/\p{L}+/u', $text);

            // Calculate minutes
            $minutes = ceil($wordCount / $wpm);

            // Optional: handle very short texts
            return $minutes;
        });


        // Setup Default User
        if (!User::count()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]);
        }
    }

}
