<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component as LivewireComponent;

#[Title('Acessar')]
#[Layout('components.layouts.authentication')]
class Login extends LivewireComponent
{
    #[Validate([
        'email' => ['required', 'exists:users,email'],
    ], message: [
        'email.required' => 'Necessário informar seu email ou usuário',
        'email.exists' => 'Usuário ou senha inválido!',
    ])]
    public string $email;

    #[Validate([
        'password' => ['required'],
    ], message: [
        'password.required' => 'Necessário inserir a senha',
    ])]
    public string $password;

    public function login()
    {
        $this->validate();

        return Auth::attempt($this->only(['email', 'password']))
            ? redirect()->intended(route('welcome'))
            : $this->addError('form.email', 'Usuário ou senha inválido!');
    }

    public function loginAsManager()
    {
        Auth::loginUsingId(
            User::where('type', 'manager')
                ->inRandomOrder()
                ->first()
            ->id
        );

        redirect()->intended(route('welcome'));
    }

    public function loginAsCashier()
    {
        Auth::loginUsingId(
            User::where('type', 'cashier')
                ->inRandomOrder()
                ->first()
            ->id
        );

        redirect()->intended(route('welcome'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
