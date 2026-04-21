<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = [
            ['name' => 'Technology', 'description' => 'Posts about tech and programming'],
            ['name' => 'Lifestyle', 'description' => 'Daily life and thoughts'],
            ['name' => 'Travel', 'description' => 'Travel experiences and guides'],
            ['name' => 'Food', 'description' => 'Recipes and dining experiences'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        Article::factory(10)->create();
    }
}
