<?php

namespace App\Services\Service;

use App\Factory;

use App\Services\Service\Admin\Access\CreateAccessService;
use App\Services\Service\Admin\Access\UpdateAccessService;
use App\Services\Service\Admin\Access\DeleteAccessService;

use App\Services\Service\Admin\BlogCategory\CreateBlogCategoryService;
use App\Services\Service\Admin\BlogCategory\UpdateBlogCategoryService;
use App\Services\Service\Admin\BlogCategory\DeleteBlogCategoryService;

use App\Services\Service\Admin\Social\CreateSocialService;
use App\Services\Service\Admin\Social\UpdateSocialService;
use App\Services\Service\Admin\Social\DeleteSocialService;

use App\Services\Service\Admin\Published\CreatePublishedService;
use App\Services\Service\Admin\Published\DeletePublishedService;
use App\Services\Service\Admin\Published\UpdatePublishedService;

use App\Services\Service\Admin\Tag\CreateTagService;
use App\Services\Service\Admin\Tag\UpdateTagService;
use App\Services\Service\Admin\Tag\DeleteTagService;

/**
 * @property CreateAccessService $createAccess
 * @property UpdateAccessService $updateAccess
 * @property DeleteAccessService $deleteAccess
 *
 * @property CreateBlogCategoryService $createBlogCategory
 * @property UpdateBlogCategoryService $updateBlogCategory
 * @property DeleteBlogCategoryService $deleteBlogCategory
 *
 * @property CreateSocialService $createSocial
 * @property UpdateSocialService $updateSocial
 * @property DeleteSocialService $deleteSocial
 *
 * @property CreatePublishedService $createPublished
 * @property DeletePublishedService $deletePublished
 * @property UpdatePublishedService $updatePublished
 *
 * @property CreateTagService $createTag
 * @property UpdateTagService $updateTag
 * @property DeleteTagService $deleteTag
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
            'updateAccess' => UpdateAccessService::class,
            'deleteAccess' => DeleteAccessService::class,

            'createBlogCategory' => CreateBlogCategoryService::class,
            'updateBlogCategory' => UpdateBlogCategoryService::class,
            'deleteBlogCategory' => DeleteBlogCategoryService::class,

            'createSocial' => CreateSocialService::class,
            'updateSocial' => UpdateSocialService::class,
            'deleteSocial' => DeleteSocialService::class,

            'createPublished' => CreatePublishedService::class,
            'deletePublished' => DeletePublishedService::class,
            'updatePublished' => UpdatePublishedService::class,

            'createTag' => CreateTagService::class,
            'updateTag' => UpdateTagService::class,
            'deleteTag' => DeleteTagService::class,
        ];
    }
}
