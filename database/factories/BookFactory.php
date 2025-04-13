<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'subtitle' => fake()->regexify('[A-Za-z0-9]{255}'),
            'heading' => fake()->regexify('[A-Za-z0-9]{255}'),
            'cover_image' => fake()->regexify('[A-Za-z0-9]{255}'),
            'content_image' => fake()->regexify('[A-Za-z0-9]{255}'),
            'price' => fake()->regexify('[A-Za-z0-9]{255}'),
            'sale_price' => fake()->regexify('[A-Za-z0-9]{255}'),
            'desc' => fake()->text(),
            'chapters' => '{}',
            'reviews' => '{}',
            'author' => fake()->regexify('[A-Za-z0-9]{255}'),
            'job_title' => fake()->regexify('[A-Za-z0-9]{255}'),
            'author_avatar' => fake()->regexify('[A-Za-z0-9]{255}'),
            'author_desc' => fake()->text(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'location' => fake()->regexify('[A-Za-z0-9]{255}'),
            'footer_desc' => fake()->text(),
        ];
    }
}
