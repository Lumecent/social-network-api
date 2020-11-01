<?php

namespace App\Http\Controllers\API\V1\User;

use App\Helpers\Answer;
use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\Profile\UserAvatarRequest;
use App\Http\Requests\User\Profile\UserCoverRequest;
use App\Http\Requests\User\Profile\UserProfileRequest;
use App\Repositories\Repository;
use App\Services\Service;

class UserProfileController extends BaseController
{
    /**
     * Show user profile
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        if ($user){
            return Answer::send('Success', [$user], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Update profile
     *
     * @param UserProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(UserProfileRequest $request)
    {
        $result = Service::getInstance()->user->updateProfile->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Update avatar
     *
     * @param UserAvatarRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \ErrorException
     */
    public function updateAvatar(UserAvatarRequest $request)
    {
        $result = Service::getInstance()->user->updateAvatar->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Delete avatar
     */
    public function deleteAvatar()
    {
        $user = Service::getInstance()->user->deleteAvatar->run();

        if ($user){
            return Answer::send('Success', ['user' => $user], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Update cover
     *
     * @param UserCoverRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \ErrorException
     */
    public function updateCover(UserCoverRequest $request)
    {
        $result = Service::getInstance()->user->updateCover->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Delete cover
     */
    public function deleteCover()
    {
        $user = Service::getInstance()->user->deleteCover->run();

        if ($user){
            return Answer::send('Success', ['user' => $user], 200);
        }

        return Answer::send('Error', [], 400);
    }
}
