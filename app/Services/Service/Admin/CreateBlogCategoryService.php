<?php

namespace App\Services\Service\Admin;

use App\Helpers\StringClean;
use App\Http\Requests\Admin\BlogCategory\CreateBlogCategoryRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class CreateBlogCategoryService extends BaseService
{
    /**
     * Create new category
     *
     * @param CreateBlogCategoryRequest $request
     * @return bool
     */
    public function run(CreateBlogCategoryRequest $request)
    {
        $blogCategory = Repository::getInstance()->blogCategory->startConditions();

        $blogCategory->name = StringClean::cleanSpace($request->name);

        return $blogCategory->save();
    }
}
