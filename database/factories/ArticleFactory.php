<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraphs(30, true),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'published_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'user_id' =>$this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
