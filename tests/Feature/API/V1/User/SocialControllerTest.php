<?php

namespace Tests\Feature\API\V1\User;

use App\Helpers\Test\TestHelper;
use Tests\BaseTest;

class SocialControllerTest extends BaseTest
{
    private $dataSocial;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->initAuthoriseRequest();

        $this->dataSocial = [
            'social' => 'fb',
            'url' => 'https://facebook.com/example'
        ];

        $this->urls = [
            'social' => "api/v1/user/{$this->user->alias}/settings/social"
        ];
    }

    public function testCreateSocialEmptyForm()
    {
        $response = $this->postJson($this->urls['social'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testCreateSocialWrongSocial()
    {
        $this->dataSocial['social'] = 'fbk';

        $response = $this->postJson($this->urls['social'], $this->dataSocial, $this->header);

        $response->assertStatus(422);
    }

    public function testCreateSocial()
    {
        $response = $this->postJson($this->urls['social'], $this->dataSocial, $this->header);

        $response->assertStatus(200);
    }

    public function testUpdateSocialEmptyForm()
    {
        $socialId = TestHelper::getSocial($this->user->id)->id;

        $response = $this->putJson("{$this->urls['social']}/{$socialId}", [], $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateSocialWrongIdUrl()
    {
        $response = $this->putJson("{$this->urls['social']}/0", $this->dataSocial, $this->header);

        $response->assertStatus(403);
    }

    public function testUpdateSocialWrongId()
    {
        $socialId = TestHelper::getSocial($this->user->id)->id;

        $response = $this->putJson("{$this->urls['social']}/{$socialId}", $this->dataSocial, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateSocial()
    {
        $socialId = TestHelper::getSocial($this->user->id)->id;

        $this->dataSocial['id'] = $socialId;
        $this->dataSocial['url'] .= '/loc';

        $response = $this->putJson("{$this->urls['social']}/$socialId", $this->dataSocial, $this->header);

        $response->assertStatus(200);
    }

    public function testDeleteSocialWrongIdUrl()
    {
        $response = $this->deleteJson("{$this->urls['social']}/0", [], $this->header);

        $response->assertStatus(403);
    }

    public function testDeleteSocialWrongId()
    {
        $socialId = TestHelper::getSocial($this->user->id)->id;

        $response = $this->deleteJson("{$this->urls['social']}/{$socialId}", [], $this->header);

        $response->assertStatus(422);
    }

    public function testDeleteSocial()
    {
        $socialId = TestHelper::getSocial($this->user->id)->id;

        $this->dataSocial['id'] = $socialId;

        $response = $this->deleteJson("{$this->urls['social']}/{$socialId}", $this->dataSocial, $this->header);

        $response->assertStatus(200);
    }
}