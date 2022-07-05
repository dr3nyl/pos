<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostSection extends Component
{
    public $posts;

    protected $listeners = ['refreshPosts'];

    public function refreshPosts()
    {
        $this->posts = Post::orderBy('id','desc')->get();
    }

    public function render()
    {
        return view('livewire.post-section');
    }

}
