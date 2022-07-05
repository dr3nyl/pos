<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Livewire\Component;

class PostInteractionButtons extends Component
{
    public $count;
    public $post;

    public function mount()
    {
        $this->count = Like::where('post_id', $this->post->id)->count();
        
    }
    
    public function render()
    {
        return view('livewire.post-interaction-buttons');
    }
    
    public function storeLike()
    {

        // if ($this->post->isLiked()) {
        //     $this->post->removeLike();

        //     $this->count--;
        // } elseif (auth()->user()) {
        //     $this->post->likes()->create([
        //         'user_id' => auth()->id(),
        //     ]);

        //     $this->count++;
            
        if ( !$this->post->likedBy(auth()->user())) {

            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id
            ]);

            $this->count++;
        }
        
        else{

            Like::where([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id
            ])->delete();
            
            $this->count--;
        }

      // $this->count = Like::where('post_id', $this->post->id)->count();
       
    }

    public function destroyLike()
    {
        Like::where([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id
        ])->delete();

        $this->count = Like::where('post_id', $this->post->id)->count();

    }
}
