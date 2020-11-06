<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\Admin\CreateAccessService;
use App\Services\Service\Admin\CreateBlogCategoryService;
use App\Services\Service\Admin\CreatePublishedService;
use App\Services\Service\Admin\CreateSocialService;
use App\Services\Service\Admin\DeleteAccessService;
use App\Services\Service\Admin\DeleteBlogCategoryService;
use App\Services\Service\Admin\DeletePublishedService;
use App\Services\Service\Admin\DeleteSocialService;
use App\Services\Service\Admin\UpdateAccessService;
use App\Services\Service\Admin\UpdateBlogCategoryService;
use App\Services\Service\Admin\UpdatePublishedService;
use App\Services\Service\Admin\UpdateSocialService;

/**
 * @property CreateAccessService $createAccess
 * @property CreateBlogCategoryService $createBlogCategory
 * @property CreatePublishedService $createPublished
 * @property CreateSocialService $createSocial
 * @property DeleteAccessService $deleteAccess
 * @property DeleteBlogCategoryService $deleteBlogCategory
 * @property DeletePublishedService $deletePublished
 * @property DeleteSocialService $deleteSocial
 * @property UpdateAccessService $updateAccess
 * @property UpdateBlogCategoryService $updateBlogCategory
 * @property UpdatePublishedService $updatePublished
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
            'createAccess' => CreateAccessService::class,
            'createBlogCategory' => CreateBlogCategoryService::class,
            'createPublished' => CreatePublishedService::class,
            'createSocial' => CreateSocialService::class,
            'deleteAccess' => DeleteAccessService::class,
            'deleteBlogCategory' => DeleteBlogCategoryService::class,
            'deletePublished' => DeletePublishedService::class,
            'deleteSocial' => DeleteSocialService::class,
            'updateAccess' => UpdateAccessService::class,
            'updateBlogCategory' => UpdateBlogCategoryService::class,
            'updatePublished' => UpdatePublishedService::class,
            'updateSocial' => UpdateSocialService::class,
        ];
    }
}
