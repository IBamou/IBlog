<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserWithArticles extends Command
{
    protected $signature = 'user:create {name : User name} {email : User email} {password : User password} {--articles=5 : Number of articles}';
    protected $description = 'Create a user with sample articles';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');
        $articles = $this->option('articles');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("User created: {$email}");

        $categories = Category::all();
        for ($i = 0; $i < $articles; $i++) {
            Article::create([
                'title' => "Sample Article " . ($i + 1) . " by {$name}",
                'content' => "This is the content for sample article " . ($i + 1) . ". It contains some interesting information that you might find useful.",
                'status' => 'published',
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);
        }

        $this->info("Created {$articles} articles for {$email}");

        return Command::SUCCESS;
    }
}