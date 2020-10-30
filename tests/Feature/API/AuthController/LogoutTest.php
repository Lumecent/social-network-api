<?php

namespace Tests\Feature\API\AuthController;

use App\Helpers\Test\TestHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogoutEmptyToken()
    {
        $response = $this->postJson('api/v1/auth/logout');

        $response->assertStatus(401);
    }

    public function testLogoutWrongToken()
    {
        $bearer = "Bearer " . Str::random();

        $response = $this->postJson('api/v1/auth/logout', [], ['Authorization' => $bearer]);

        $response->assertStatus(401);
    }

    public function testLogout()
    {
        $token = TestHelper::authToken();

        $bearer = "Bearer {$token}";

        $response = $this->postJson('api/v1/auth/logout', [], ['Authorization' => $bearer]);

        $response->assertStatus(200);
    }
}
