<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|min:3|max:100|unique:users,email')]
    public $email;

    #[Rule('required|min:6|max:244|confirmed')]
    public $password;

    #[Rule('required')]
    public $password_confirmation;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create()
    {
        sleep(2);

        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('profile_pictures', 'public');
        }

        User::create($validated);

        $this->reset();

        session()->flash('successMessage', 'Account created successfully!');
    }

    public function removeImage()
    {
        $this->reset('image');
    }

    #[Title('Login Page')]
    public function render()
    {
        return view('livewire.registration');
    }
}
