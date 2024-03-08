<?php

namespace Tests\Feature;

use App\Livewire\Authentication\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_renders_successfully()
    {
        Livewire::test(Login::class)
            ->assertStatus(200);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect(route('welcome'));
    }

    public function test_validate_required_fields()
    {
        Livewire::test(Login::class)
            ->call('login')
            ->assertHasErrors('email', ['required'])
            ->assertHasErrors('password', ['required']);
    }

    public function test_validate_exists_fields()
    {
        $user = User::factory()->create();

        $stubUser = User::factory()->make();

        Livewire::test(Login::class)
            ->set('email', $stubUser->email)
            ->set('password', $user->password)
            ->call('login')
            ->assertHasErrors('email', ['exists']);
    }
}
