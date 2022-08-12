<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreatePosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assign value for $posts
     *
     */
    public function test_user_posts_are_rendered_in_the_dashboard()
    {
        $posts = Post::factory(3)->create();

        Livewire::test(CreatePosts::class, ['posts' => $posts])
            ->assertSet('posts', $posts)
            ->assertSee('body');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticated_user_can_create_post()
    {
        $posts = Post::factory(3)->create();
        Livewire::actingAs(User::factory()->create());

        Livewire::test(
            CreatePosts::class,
            [
                'posts' => $posts,
                'body' => 'Test body of a post'
            ]
        )
        ->assertSet('posts', $posts)
        ->call('store');

        $this->assertTrue(Post::whereBody('Test body of a post')->exists());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticated_user_can_delete_post()
    {
        $posts = Post::factory(3)->create();
        Livewire::actingAs(User::factory()->create());

        Livewire::test(
            CreatePosts::class,
            [
                'posts' => $posts,
                'body' => 'Test body of a post'
            ]
        )
        ->assertSet('posts', $posts)
        ->call('store');

        $this->assertTrue(Post::whereBody('Test body of a post')->exists());
    }
    
}
