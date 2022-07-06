<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePosts extends Component
{
    public $body;
    public $posts;

    // Event listener
    protected $listeners = ['destroy'];

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
        
        $this->refreshPostSection();
        
        // Trigger sweet alert
        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'Post sucessfully!',
            'text' => ''
        ]);
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

        $this->refreshPostSection();

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

    /**
     * Create sweet modal
     *
     * @param mixed $modalType
     * @param Array $attributes
     * 
     * @return void
     * 
     */
    public function swalModal($modalType, Array $attributes)
    {
        $this->dispatchBrowserEvent('swal:'.$modalType, $attributes);
    }

    /**
     * Rehydrate / Re-render Post model
     *
     * @return void
     * 
     */
    public function refreshPostSection()
    {
        $this->posts = Post::orderBy('id','desc')->get();
    }

    
}
