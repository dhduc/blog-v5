<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Navigation;

class NavigationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Navigation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'icon' => fake()->regexify('[A-Za-z0-9]{255}'),
            'text' => fake()->regexify('[A-Za-z0-9]{255}'),
            'url' => fake()->url(),
        ];
    }
}
