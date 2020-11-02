<?php

namespace Tests\Feature\API\V1\User;

use App\Helpers\Test\TestHelper;
use Tests\BaseTest;

class UserProfileControllerTest extends BaseTest
{
    private $dataProfile;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->initAuthoriseRequest();

        $this->dataProfile = [
            'alias' => $this->faker->lastName,
            'info' => $this->faker->text(50),
            'date_bd' => $this->faker->date()
        ];

        $this->urls = [
            'profile' => "api/v1/user/{$this->user->alias}/settings/profile",
            'avatar' => "api/v1/user/{$this->user->alias}/settings/avatar",
            'cover' => "api/v1/user/{$this->user->alias}/settings/cover",
        ];
    }

    public function testUpdateProfileEmptyForm()
    {
        $response = $this->putJson($this->urls['profile'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateProfileWrongAlias()
    {
        $this->dataProfile['alias'] = 'i mustafa';

        $response = $this->putJson($this->urls['profile'], $this->dataProfile, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateProfileNotUniqueAlias()
    {
        $user = TestHelper::getRandomUser();

        $this->dataProfile['alias'] = $user->alias;

        $response = $this->putJson($this->urls['profile'], $this->dataProfile, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateProfileWrongInfo()
    {
        $this->dataProfile['info'] = $this->faker->text(11000);

        $response = $this->putJson($this->urls['profile'], $this->dataProfile, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateProfileWrongDateBD()
    {
        $this->dataProfile['date_bd'] = '2100-10-05';

        $response = $this->putJson($this->urls['profile'], $this->dataProfile, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateProfile()
    {
        $response = $this->putJson($this->urls['profile'], $this->dataProfile, $this->header);

        $response->assertStatus(200);
    }

    public function testUpdateAvatarEmptyImage()
    {
        $response = $this->putJson($this->urls['avatar'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateAvatarWrongImage()
    {
        $data = [
            'avatar' => 'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
        ];

        $response = $this->putJson($this->urls['avatar'], $data, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCoverEmptyImage()
    {
        $response = $this->putJson($this->urls['cover'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCoverWrongImage()
    {
        $data = [
            'cover' => 'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
        ];

        $response = $this->putJson($this->urls['cover'], $data, $this->header);

        $response->assertStatus(422);
    }

}
