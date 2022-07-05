<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePosts extends Component
{
    public $story;
    public $posts;

    // Event listener
    protected $listeners = ['destroy'];

    public function store()
    {
        // Put loading every post
        sleep(1);

        Post::create([

            'user_id' => auth()->id(),
            'body' => $this->story
        ]);

        $this->story = '';
        
        $this->refreshPostSection();

        $this->swalModal('modal', [
            'type' => 'success',
            'title' => 'Post sucessfully!',
            'text' => ''
        ]);
    }

    public function deleteConfirm($id)
    {
        $this->swalModal('confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();

        $this->refreshPostSection();
    }

    public function swalModal($modalType, Array $attributes)
    {
        $this->dispatchBrowserEvent('swal:'.$modalType, $attributes);
    }

    public function refreshPostSection()
    {
        $this->posts = Post::orderBy('id','desc')->get();
    }

    public function render()
    {
        return view('livewire.create-posts');
    }
    
}
