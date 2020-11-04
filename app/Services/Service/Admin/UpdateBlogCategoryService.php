<?php

namespace App\Services\Service\Admin;

use App\Helpers\StringClean;
use App\Http\Requests\Admin\BlogCategory\UpdateBlogCategoryRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateBlogCategoryService extends BaseService
{
    /**
     * Update category
     *
     * @param UpdateBlogCategoryRequest $request
     * @return bool
     */
    public function run(UpdateBlogCategoryRequest $request)
    {
        $blogCategory = Repository::getInstance()->blogCategory->findById($request->id);

        $blogCategory->name = StringClean::cleanSpace($request->name);

        return $blogCategory->save();
    }
}
