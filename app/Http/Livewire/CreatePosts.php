<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePosts extends Component
{

    public $body;

    /**
     * Display livewire component blade
     *
     * @return view
     * 
     */
    public function render()
    {
        return view('livewire.create-posts');
    }
    
    /**
     * Store a post to Post model
     *
     * @return void
     * 
     */
    public function store(): void
    {
        // Put loading every post
        sleep(1);

        Post::create([

            'user_id' => auth()->id(),
            'body' => $this->body
        ]);

        // Empty post body after submission
        $this->body = '';
        
        $this->emit('refreshPosts');
        
        // Trigger sweet alert
        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'Post sucessfully!',
            'text' => ''
        ]);
    }
}
