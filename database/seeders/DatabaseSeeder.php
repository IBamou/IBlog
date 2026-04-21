<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology', 'description' => 'Posts about tech and programming'],
            ['name' => 'Lifestyle', 'description' => 'Daily life and thoughts'],
            ['name' => 'Travel', 'description' => 'Travel experiences and guides'],
            ['name' => 'Food', 'description' => 'Recipes and dining experiences'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $categoryIds = Category::pluck('id')->toArray();

        $user = User::create([
            'name' => 'ilyas',
            'email' => 'ilyas0bmp@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        Article::create([
            'title' => 'My First Blog Post',
            'content' => 'This is my first article. Hello world!',
            'status' => 'published',
            'user_id' => $user->id,
            'category_id' => $categoryIds[0] ?? null,
        ]);

        Article::create([
            'title' => 'Learning Laravel',
            'content' => 'Laravel is an amazing PHP framework. I really enjoy building web applications with it.',
            'status' => 'published',
            'user_id' => $user->id,
            'category_id' => $categoryIds[1] ?? null,
        ]);

        Article::create([
            'title' => 'My Daily Routine',
            'content' => 'Today I want to share my daily routine as a developer.',
            'status' => 'draft',
            'user_id' => $user->id,
            'category_id' => $categoryIds[2] ?? null,
        ]);

        Article::factory(10)->create();
    }
}
