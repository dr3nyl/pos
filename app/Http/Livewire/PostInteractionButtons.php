<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Traits\NotificationTrait;
use Livewire\Component;
use Illuminate\Support\Str;

class PostInteractionButtons extends Component
{
    use NotificationTrait;
    
    /**
     * $post = current post instance
     * $posts = Post model
     * $count = count of likes per post
     * 
     */

    public int $count;
    public $post;
    public $isLiked;

    public $comment;
    public $comments;
    public string $commentLabel;
    protected int $commentCount = 0;

    public function mount(Post $posts, User $user)
    {
        $this->count = $posts->likesCount($this->post);
        $this->isLiked = $this->post->likedBy(auth()->user());
        $this->comments = $posts->comments($this->post);

        $this->commentLabel = Str::plural('comment',$this->comments);
        
    }
    
    public function render()
    {
        return view('livewire.post-interaction-buttons');
    }
    
    /**
     * Start like section
     */
    public function storeLike()
    {

        if (!$this->post->likedBy(auth()->user())) {

            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id
            ]);

            $this->count++;
            $this->isLiked = 1;
        }
        
        else{

            Like::where([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id
            ])->delete();
            
            $this->count--;
            $this->isLiked = 0;
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
    /**
     * End like section
     */

    ######################################################################
     /**
      * Start comment section
      */
    public function storeComment()
    {
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'comment' => $this->comment
        ]);

        $this->comment = '';
        
        $this->refreshCommentSection();

        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'You commented on a post!',
            'text' => ''
        ]);

    }

    public function loadComments()
    {
        $page = ++$this->commentCount;
        
        array_push($this->data, $this->comments(10, ['*'], 'page', $page)->items);
    }

    private function refreshCommentSection()
    {
        $this->comments = Comment::where('post_id', $this->post->id)->orderBy('id','desc')->get();
    }
}
