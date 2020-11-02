<?php

namespace Tests;

use App\Helpers\Test\TestHelper;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BaseTest extends TestCase
{
    use WithFaker;

    protected $urls;

    protected $token;
    protected $header;
    protected $user;

    public function initAuthoriseRequest()
    {
        $this->token = TestHelper::authToken();
        $this->header = ['Authorization' => "Bearer {$this->token}"];
        $this->user = TestHelper::getUser();
    }
}
