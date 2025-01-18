<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete($postId)
    {
        try {
            Post::destroy($postId);

            session()->flash('message', 'Post deleted successfully');
        } catch (\Exception $e) {
            session()->flash('message', 'Error deleting post');
        }
    }

    #[On('post-created')]
    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
}
