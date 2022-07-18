<?php

namespace Tests\Feature;

use App\Http\Livewire\CreatePosts;
use App\Models\Post;
use App\Models\User;
use App\View\Components\CreatePost;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ManagePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function auth_user_can_post()
    {
        $this->withoutExceptionHandling();

        $user = $this->actingAs(User::factory()->create());

        $body = 'Sample post';

        Livewire::auth(CreatePosts::class)
            ->set('body', $body)
            ->set('posts', Post::factory()->create(3))
            ->call('store');
        
        $this->assertTrue(Post::where('body', $body));
    }
}
