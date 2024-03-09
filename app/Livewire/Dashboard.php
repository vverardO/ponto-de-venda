<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

#[Title('Dashboard')]
class Dashboard extends LivewireComponent
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
