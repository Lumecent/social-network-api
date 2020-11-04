<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\Admin\CreateBlogCategoryService;
use App\Services\Service\Admin\CreateSocialService;
use App\Services\Service\Admin\DeleteBlogCategoryService;
use App\Services\Service\Admin\DeleteSocialService;
use App\Services\Service\Admin\UpdateBlogCategoryService;
use App\Services\Service\Admin\UpdateSocialService;

/**
 * @property CreateBlogCategoryService $createBlogCategory
 * @property CreateSocialService $createSocial
 * @property DeleteBlogCategoryService $deleteBlogCategory
 * @property DeleteSocialService $deleteSocial
 * @property UpdateBlogCategoryService $updateBlogCategory
 * @property UpdateSocialService $updateSocial
 *
 * Class AdminService
 * @package App\Services\Service
 */
class AdminService extends Factory
{
    protected function aliases()
    {
        return [
            'createBlogCategory' => CreateBlogCategoryService::class,
            'createSocial' => CreateSocialService::class,
            'deleteBlogCategory' => DeleteBlogCategoryService::class,
            'deleteSocial' => DeleteSocialService::class,
            'updateBlogCategory' => UpdateBlogCategoryService::class,
            'updateSocial' => UpdateSocialService::class,
        ];
    }
}
