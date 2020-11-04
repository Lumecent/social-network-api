<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Admin\BlogCategory\CreateBlogCategoryRequest;
use App\Http\Requests\Admin\BlogCategory\DeleteBlogCategoryRequest;
use App\Http\Requests\Admin\BlogCategory\UpdateBlogCategoryRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AdminBlogCategoryController extends BaseController
{
    /**
     * Getting all category for blog
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $blogCategory = Repository::getInstance()->blogCategory->getAll();

        return $this->response($blogCategory, [$blogCategory]);
    }

    /**
     * Create new category
     *
     * @param CreateBlogCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateBlogCategoryRequest $request)
    {
        $result = Service::getInstance()->admin->createBlogCategory->run($request);

        return $this->response($result);
    }

    /**
     * Update category
     *
     * @param UpdateBlogCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBlogCategoryRequest $request)
    {
        $result = Service::getInstance()->admin->updateBlogCategory->run($request);

        return $this->response($result);
    }

    /**
     * Delete category
     *
     * @param DeleteBlogCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DeleteBlogCategoryRequest $request)
    {
        $result = Service::getInstance()->admin->deleteBlogCategory->run($request);

        return $this->response($result);
    }
}
