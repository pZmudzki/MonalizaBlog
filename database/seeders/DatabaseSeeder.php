<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Visit;
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

        $visits = Visit::factory(250)->create();

        foreach ($visits as $visit) {
            if (rand(0, 2) === 0) {
                foreach ($posts as $post) {
                    if (rand(0, 20) === 0) {
                        Comment::factory()->create([
                            'visit_id' => $visit->id,
                            'post_id' => $post->id,
                        ]);
                    }
                }
            }
        }
    }
}
