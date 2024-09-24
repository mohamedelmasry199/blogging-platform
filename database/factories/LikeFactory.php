<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $reader = User::where('role', 'reader')->inRandomOrder()->first();
            $article = Article::where('is_active', true)->inRandomOrder()->first();
            $likeExists = Like::where('user_id', $reader->id)
                ->where('article_id', $article->id)
                ->exists();
        } while ($likeExists);

        return [
            'user_id' => $reader->id,
            'article_id' => $article->id,
            'like' => $this->faker->boolean(),
        ];
    }
}
