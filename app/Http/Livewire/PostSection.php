<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostSection extends Component
{
    public Post $post;
    public $posts;

    protected $listeners = ['$refresh'];

    public function mount()
    {
       $this->posts = Post::orderBy('id','desc')->get();
      // $this->refreshPosts();
    }

    public function refreshPosts()
    {
        return Post::orderBy('id','desc')->get();
    }

    public function render()
    {
        return view('livewire.post-section');
    }

}
