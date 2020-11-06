<?php

namespace Tests\Feature\API\V1\Admin;

use App\Helpers\Test\TestHelper;
use Tests\BaseTest;

class AdminTagControllerTest extends BaseTest
{
    private $dataTag;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->initAuthoriseRequest();

        $this->dataTag = [
            'id' => TestHelper::getLastTag()->id,
            'name' => $this->faker->lastName,
        ];

        $this->urls = [
            'tag' => 'api/v1/admin/tag'
        ];
    }

    public function testCreateTagEmptyForm()
    {
        $response = $this->postJson($this->urls['tag'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testCreateTagWrongName()
    {
        $this->dataTag['name'] = 'n@me';

        $response = $this->postJson($this->urls['tag'], $this->dataTag, $this->header);

        $response->assertStatus(422);
    }

    public function testCreateTag()
    {
        $response = $this->postJson($this->urls['tag'], $this->dataTag, $this->header);

        $response->assertStatus(200);
    }

    public function testUpdateTagWrongName()
    {
        $this->dataTag['name'] = 'n@me';

        $response = $this->putJson("{$this->urls['tag']}/{$this->dataTag['id']}", $this->dataTag, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateTagNotExistsTag()
    {
        $this->dataTag['id'] = 0;

        $response = $this->putJson("{$this->urls['tag']}/{$this->dataTag['id']}", $this->dataTag, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateTag()
    {
        $response = $this->putJson("{$this->urls['tag']}/{$this->dataTag['id']}", $this->dataTag, $this->header);

        $response->assertStatus(200);
    }

    public function testDeleteTagNotExistsTag()
    {
        $this->dataTag['id'] = 0;

        $response = $this->deleteJson("{$this->urls['tag']}/{$this->dataTag['id']}", $this->dataTag, $this->header);

        $response->assertStatus(422);
    }

    public function testDeleteTag()
    {
        $response = $this->deleteJson("{$this->urls['tag']}/{$this->dataTag['id']}", $this->dataTag, $this->header);

        $response->assertStatus(200);
    }
}