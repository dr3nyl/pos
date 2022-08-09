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
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_post()
    {
        $user = $this->actingAs(User::factory()->create());

        Livewire::test(CreatePosts::class)
            ->set('user_id', $user->id)
            ->set('body', 'Test body of a post')
            ->call('store');

        $this->assertTrue(Post::whereBody('Test body of a post')->exists());
    }
}
