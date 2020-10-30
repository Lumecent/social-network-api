<?php

namespace Tests\Feature\API\AuthController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginEmptyForm()
    {
        $response = $this->postJson('api/v1/auth/login');

        $response->assertStatus(422);
    }

    public function testLoginWrongEmail()
    {
        $data = [
            'email' => 'mustafa',
            'password' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/login', $data);

        $response->assertStatus(422);
    }

    public function testLoginNotExistsEmail()
    {
        $data = [
            'email' => 'mustafa@local.com',
            'password' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/login', $data);

        $response->assertStatus(422);
    }

    public function testLoginWrongPassword()
    {
        $data = [
            'email' => 'mustafa@example.com',
            'password' => 'pass'
        ];

        $response = $this->postJson('api/v1/auth/login', $data);

        $response->assertStatus(422);
    }

    public function testLoginInvalidPassword()
    {
        $data = [
            'email' => 'mustafa@example.com',
            'password' => 'p@ssw0rd'
        ];

        $response = $this->postJson('api/v1/auth/login', $data);

        $response->assertStatus(422);
    }

    public function testLogin()
    {
        $data = [
            'email' => 'mustafa@example.com',
            'password' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/login', $data);

        $response->assertStatus(200);
    }
}
