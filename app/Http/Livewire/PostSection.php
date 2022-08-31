<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Traits\NotificationTrait;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class PostSection extends Component
{
    use NotificationTrait;

    public $postPerPage = 5;
    public $userId;
    // Event listeners
    protected $listeners = [
        'refreshPosts', 
        'destroy',
        'load-more' => 'loadMore'];

    public function loadMore()
    {
        $this->postPerPage += 5;
    }

    /**
     * Rehydrate / Re-render Post model
     *
     * @return void
     * 
     */
    public function refreshPosts()
    {
        if (!empty($this->userId)) {
            $this->posts = Post::latest()->where('user_id', $this->userId)->limit($this->postPerPage)->get();
        } else {
            $this->posts = Post::latest()->limit($this->postPerPage)->get();
        }
    }

    /**
     * Delete a post from Post model
     *
     * @param mixed $id
     * 
     * @return void
     * 
     */
    public function destroy($id): void
    {
        Post::where('id', $id)->delete();
        
        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'Post deleted!',
            'text' => ''
        ]);

        $this->refreshPosts();
    }

    /**
     * Sweet alert delete confirmation
     *
     * @param mixed $id
     * 
     * @return void
     * 
     */
    public function deleteConfirm($id)
    {
        $this->swalModal('confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this",
            'id' => $id
        ]);
    }

    public function render()
    {
        if (!empty($this->userId)) {
            $posts = Post::latest()->where('user_id', $this->userId)->limit($this->postPerPage)->get();
        } else {
            $posts = Post::latest()->limit($this->postPerPage)->get();
        }

        return view('livewire.post-section', ['posts'=> $posts]);
    }
}
