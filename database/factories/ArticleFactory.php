<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author =User::where('role','author')->inRandomOrder()->first();
        return [
            'user_id' => $author->id,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'is_active' => $this->faker->boolean(),
            'is_featured' => $this->faker->boolean(),
            'view_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
