<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lesson;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'image' => fake()->regexify('[A-Za-z0-9]{255}'),
            'screencast' => fake()->regexify('[A-Za-z0-9]{255}'),
            'desc' => fake()->text(),
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
