<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\BlogCategory\DeleteBlogCategoryRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteBlogCategoryService extends BaseService
{
    /**
     * Delete category
     *
     * @param DeleteBlogCategoryRequest $request
     * @return bool|null
     * @throws \Exception
     */
    public function run(DeleteBlogCategoryRequest $request)
    {
        $blogCategory = Repository::getInstance()->blogCategory->findById($request->id);

        return $blogCategory->delete();
    }
}
