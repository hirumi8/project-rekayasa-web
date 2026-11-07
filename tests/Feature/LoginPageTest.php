<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_displays_the_login_form(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Login Admin')
            ->assertSee('SISTEM INFORMASI')
            ->assertSee('Email')
            ->assertSee('Password')
            ->assertSee('Ingat saya')
            ->assertSee(route('login.store'))
            ->assertSee(asset('img/Screenshot (280).png'))
            ->assertSee('center / cover no-repeat fixed')
            ->assertDontSee('UNPAM - Prodi');
    }

    public function test_guest_is_redirected_to_login_from_admin_pages(): void
    {
        $this->get(route('projects.index'))
            ->assertRedirect(route('login'));
    }

    public function test_valid_credentials_authenticate_user_and_open_admin_projects(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('projects.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_return_an_error_and_keep_user_guest(): void
    {
        $user = User::factory()->create();

        $response = $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => $user->email,
                'password' => 'incorrect-password',
            ]);

        $response->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_log_out(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    public function test_login_attempts_are_limited_per_email_and_ip(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->from(route('login'))->post(route('login.store'), [
                'email' => 'blocked@example.com',
                'password' => 'incorrect-password',
            ])->assertRedirect(route('login'));
        }

        $this->post(route('login.store'), [
            'email' => 'blocked@example.com',
            'password' => 'incorrect-password',
        ])->assertStatus(429);
    }
}
