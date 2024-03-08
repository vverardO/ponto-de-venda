<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component as LivewireComponent;

class Welcome extends LivewireComponent
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $user = auth()->user();

        $title = 'Seja bem vindo '.$user->name.' - '.$user->type;

        return view('livewire.welcome')
            ->title($title);
    }
}
