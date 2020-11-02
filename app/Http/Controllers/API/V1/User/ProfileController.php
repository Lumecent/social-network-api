<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\Profile\UpdateAvatarRequest;
use App\Http\Requests\User\Profile\UpdateCoverRequest;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Repositories\Repository;
use App\Services\Service;

class ProfileController extends BaseController
{
    /**
     * Show user profile
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        return $this->response($user, [$user]);
    }

    /**
     * Update profile
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $result = Service::getInstance()->user->updateProfile->run($request);

        return $this->response($result);
    }

    /**
     * Update avatar
     *
     * @param UpdateAvatarRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \ErrorException
     */
    public function updateAvatar(UpdateAvatarRequest $request)
    {
        $result = Service::getInstance()->user->updateAvatar->run($request);

        return $this->response($result);
    }

    /**
     * Delete avatar
     */
    public function deleteAvatar()
    {
        $user = Service::getInstance()->user->deleteAvatar->run();

        return $this->response($user, [$user]);
    }

    /**
     * Update cover
     *
     * @param UpdateCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \ErrorException
     */
    public function updateCover(UpdateCoverRequest $request)
    {
        $result = Service::getInstance()->user->updateCover->run($request);

        return $this->response($result);
    }

    /**
     * Delete cover
     */
    public function deleteCover()
    {
        $user = Service::getInstance()->user->deleteCover->run();

        return $this->response($user, [$user]);
    }
}
