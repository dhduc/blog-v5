<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'canonical' => fake()->word(),
            'description' => fake()->text(),
            'image' => fake()->word(),
            'categories' => fake()->word(),
            'content' => fake()->paragraphs(3, true),
            'modified_at' => fake()->dateTime(),
            'published_at' => fake()->dateTime(),
        ];
    }
}
