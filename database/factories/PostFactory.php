<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd(Post::$types[0]);
        return [
            'title' => fake()->words(3, true),
            'content' => fake()->paragraphs(rand(6, 10), true),
            'type' => Post::$types[rand(0, 3)],
        ];
    }
}
