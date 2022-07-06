<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class PostInteractionButtons extends Component
{
    /**
     * $post = current post instance
     * $posts = Post model
     * $count = count of likes per post
     * 
     */

    public $count;
    public $post;

    public function mount(Post $posts)
    {
        $this->count = $posts->likesCount($this->post);
        
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
       
    }

    public function destroyLike()
    {
        Like::where([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id
        ])->delete();

        $this->count = $this->posts->likesCount($this->post);

    }
}
