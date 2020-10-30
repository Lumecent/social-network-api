<?php

namespace Tests\Feature\API\AuthController;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testRegisterEmptyForm()
    {
        $response = $this->postJson('api/v1/auth/register');

        $response->assertStatus(422);
    }

    public function testRegisterWrongName()
    {
        $data = [
            'name' => 'Mu',
            'email' => 'mustafa@example.com',
            'password' => 'password',
            'password_confirm' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/register', $data);

        $response->assertStatus(422);
    }

    public function testRegisterWrongEmail()
    {
        $data = [
            'name' => 'Mustafa Zambitca',
            'email' => 'mustafa@',
            'password' => 'password',
            'password_confirm' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/register', $data);

        $response->assertStatus(422);
    }

    public function testRegisterWrongPassword()
    {
        $data = [
            'name' => 'Mustafa Zambitca',
            'email' => 'mustafa@example.com',
            'password' => 'pass',
            'password_confirm' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/register', $data);

        $response->assertStatus(422);
    }

    public function testRegisterWrongPasswordConfirm()
    {
        $data = [
            'name' => 'Mustafa Zambitca',
            'email' => 'mustafa@example.com',
            'password' => 'password',
            'password_confirm' => 'passwd'
        ];

        $response = $this->postJson('api/v1/auth/register', $data);

        $response->assertStatus(422);
    }

    public function testRegister()
    {
        $data = [
            'name' => 'Mustafa Zambitca',
            'email' => 'mustafa@example.com',
            'password' => 'password',
            'password_confirm' => 'password'
        ];

        $response = $this->postJson('api/v1/auth/register', $data);

        $response->assertStatus(200);
    }
}
