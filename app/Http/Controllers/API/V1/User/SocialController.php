<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\Social\DeleteSocialRequest;
use App\Http\Requests\User\Social\CreateSocialRequest;
use App\Http\Requests\User\Social\UpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\Service;

class SocialController extends BaseController
{
    /**
     * Show all social contact for user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $social = Repository::getInstance()->userSocial->findByUserId($user->id);

        return $this->response($social, [$social]);
    }

    /**
     * Create new social contact
     *
     * @param CreateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSocialRequest $request)
    {
        $result = Service::getInstance()->user->createSocial->run($request);

        return $this->response($result);
    }

    /**
     * Update user social
     *
     * @param UpdateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSocialRequest $request)
    {
        $result = Service::getInstance()->user->updateSocial->run($request);

        return $this->response($result);
    }

    /**
     * Delete user social
     *
     * @param DeleteSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteSocialRequest $request)
    {
        $result = Service::getInstance()->user->deleteSocial->run($request);

        return $this->response($result);
    }
}
