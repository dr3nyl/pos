<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Traits\NotificationTrait;
use Livewire\Component;

class PostSection extends Component
{
    use NotificationTrait;

    public $posts;
    
    // Event listeners
    protected $listeners = ['refreshPosts', 'destroy'];

    /**
     * Rehydrate / Re-render Post model
     *
     * @return void
     * 
     */
    public function refreshPosts()
    {
        $this->posts = Post::orderBy('id','desc')->get();
    }

    public function render()
    {
        return view('livewire.post-section');
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

        $this->refreshPosts();
        
        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'Post deleted!',
            'text' => ''
        ]);
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

}
