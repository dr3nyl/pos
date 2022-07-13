<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)
            ->create()
            ->each( function ($user) {
                Post::factory(3)
                    ->create([
                        'user_id' => $user->id
                    ])
                    ->each(function ($post) use ($user) {
                        Comment::factory(3)
                        ->create([
                            'user_id' => $user->id,
                            'post_id' => $post->id
                        ]);
                    });
            });
            
    }
}
