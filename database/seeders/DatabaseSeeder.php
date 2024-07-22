<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Monaliza',
            'email' => 'test@test.com',
        ]);

        $posts = Post::factory(25)->create();

        foreach ($posts as $post) {
            for ($i = 0; $i < rand(1, 8); $i++) {
                Comment::factory()->create([
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
