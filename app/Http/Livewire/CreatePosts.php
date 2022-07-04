<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePosts extends Component
{
    public $story;
    public $posts;


    public function mount()
    {
        $this->posts = Post::orderBy('id','desc')->get();
    }

    public function store()
    {
        sleep(1);

        Post::create([

            'user_id' => auth()->id(),
            'body' => $this->story
        ]);

        $this->story = '';
        
        $this->posts = Post::orderBy('id','desc')->get();
            
        $this->dispatchBrowserEvent('swal:modal', [

            'type' => 'success',
            'title' => 'Post sucessfully!',
            'text' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.create-posts');
    }
}
