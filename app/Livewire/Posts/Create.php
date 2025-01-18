<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required|string|min:3|max:244')]
    public $title;

    #[Rule('required|image|max:1024')]
    public $thumbnail;

    #[Rule('required')]
    public $content;

    public function create() {
        $validated = $this->validate();

        $validated['thumbnail'] = $this->thumbnail->store('thumbnails', 'public');

        $post = Post::create($validated);

        $this->reset();

        session()->flash('success', 'Post created success fully!');

        $this->dispatch('post-created', $post);
    }
    public function render()
    {
        sleep(2);

        return view('livewire.posts.create');
    }
}
