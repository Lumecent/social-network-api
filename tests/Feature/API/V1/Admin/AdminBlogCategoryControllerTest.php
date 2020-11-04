<?php

namespace Tests\Feature\API\V1\Admin;

use App\Helpers\Test\TestHelper;
use Tests\BaseTest;

class AdminBlogCategoryControllerTest extends BaseTest
{
    private $dataCategory;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->initAuthoriseRequest();

        $this->dataCategory = [
            'name' => $this->faker->lastName
        ];

        $this->urls = [
            'blogCategory' => "api/v1/admin/blog-category"
        ];
    }

    public function testCreateCategoryEmptyForm()
    {
        $response = $this->postJson($this->urls['blogCategory'], [], $this->header);

        $response->assertStatus(422);
    }

    public function testCreateCategoryWrongName()
    {
        $this->dataCategory['name'] = 'na';

        $response = $this->postJson($this->urls['blogCategory'], $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testCreateCategoryNotUniqueName()
    {
        $this->dataCategory['name'] = 'личное';

        $response = $this->postJson($this->urls['blogCategory'], $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testCreateCategory()
    {
        $response = $this->postJson($this->urls['blogCategory'], $this->dataCategory, $this->header);

        $response->assertStatus(200);
    }

    public function testUpdateCategoryEmptyForm()
    {
        $this->dataCategory['id'] = TestHelper::getAdminLastBlogCategory()->id;

        $response = $this->putJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", [], $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCategoryNotExistsCategory()
    {
        $this->dataCategory['id'] = 0;

        $response = $this->putJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCategoryWrongName()
    {
        $this->dataCategory['id'] = TestHelper::getAdminLastBlogCategory()->id;
        $this->dataCategory['name'] = 'na';

        $response = $this->putJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCategoryNotUniqueName()
    {
        $this->dataCategory['id'] = TestHelper::getAdminLastBlogCategory()->id;
        $this->dataCategory['name'] = 'личное';

        $response = $this->putJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testUpdateCategory()
    {
        $this->dataCategory['id'] = TestHelper::getAdminLastBlogCategory()->id;

        $response = $this->putJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(200);
    }

    public function testDeleteCategoryNotExistsCategory()
    {
        $this->dataCategory['id'] = 0;

        $response = $this->deleteJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(422);
    }

    public function testDeleteCategory()
    {
        $this->dataCategory['id'] = TestHelper::getAdminLastBlogCategory()->id;

        $response = $this->deleteJson("{$this->urls['blogCategory']}/{$this->dataCategory['id']}", $this->dataCategory, $this->header);

        $response->assertStatus(200);
    }
}