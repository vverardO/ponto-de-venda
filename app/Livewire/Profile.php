<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Perfil')]
class Profile extends Component
{
    public User $user;

    public string $name;

    public string $email;

    public string $phone;

    public string $registration_physical_person;

    public function mount()
    {
        $this->user = auth()->user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->registration_physical_person = $this->user->registration_physical_person;
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function store()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->registration_physical_person = $this->registration_physical_person;

        $this->user->save();

        $this->dispatch(
            'alert',
            type: 'success',
            message: 'Perfil atualizado com sucesso!'
        );
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'registration_physical_person' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
        ];
    }
}
