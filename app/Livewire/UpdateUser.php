<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateUser extends Component
{
    public User $user;

    public string $name;

    public string $email;

    public string $password = '';

    public string $registration_physical_person;

    public string $phone;

    public string $type;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->type = $this->user->type;
        $this->registration_physical_person = $this->user->registration_physical_person;
    }

    public function render()
    {
        $title = "Usuário - {$this->user->name} - {$this->user->email}";

        return view('livewire.update-user')
            ->title($title);
    }

    public function store()
    {
        $this->validate();

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->type = $this->type;
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
            'type' => [
                'required',
            ],
            'registration_physical_person' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Qual o nome?',
            'phone.required' => 'Qual o telefone?',
            'registration_physical_person.required' => 'Qual o cpf?',
            'registration_physical_person.unique' => 'CPF já existente na base, verifique.',
            'type.required' => 'Selecione o acesso',
        ];
    }
}
