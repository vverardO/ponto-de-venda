<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Usuários')]
class Users extends Component
{
    #[Url(except: '', as: 'pesquisa')]
    public string $search = '';

    public function render()
    {
        $users = User::when($this->search, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'like', "%$this->search%");
                $query->orWhere('email', 'like', "%$this->search%");
                $query->orWhere('phone', 'like', "%$this->search%");
                $query->orWhere('registration_physical_person', 'like', "%$this->search%");
            });
        })->get();

        return view('livewire.users')
            ->with('users', $users);
    }
}
