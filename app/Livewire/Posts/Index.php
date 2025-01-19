<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function mount($search)
    {
        $this->search = $search;
    }

    public function delete($postId)
    {
        try {
            Post::destroy($postId);

            session()->flash('message', 'Post deleted successfully');
        } catch (\Exception $e) {
            session()->flash('message', 'Error deleting post');
        }
    }

    #[Computed()]
    public function posts()
    {
        return Post::latest()
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(5);
    }

    #[On('post-created')]
    public function render()
    {
        return view('livewire.posts.index', []);
    }
}
