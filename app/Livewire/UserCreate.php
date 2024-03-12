<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Novo usuário')]
class UserCreate extends Component
{
    public User $user;

    public string $name;

    public string $email;

    public string $password;

    public string $registration_physical_person;

    public string $phone;

    public string $type;

    public function mount()
    {
        $this->user = new User;
    }

    public function render()
    {
        return view('livewire.create-user');
    }

    public function store()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->type = $this->type;
        $this->user->password = Hash::make($this->password);
        $this->user->registration_physical_person = $this->registration_physical_person;

        $this->user->save();

        session()->flash('message', 'Usuário criado com sucesso!');
        session()->flash('type', 'success');

        return redirect()->route('users');
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
            'email' => [
                'required',
                Rule::unique('users'),
            ],
            'password' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'registration_physical_person' => [
                'required',
                Rule::unique('users'),
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
            'password.required' => 'Qual a senha?',
            'email.required' => 'Qual o email?',
            'email.unique' => 'Email já existente na base, verifique.',
        ];
    }
}
