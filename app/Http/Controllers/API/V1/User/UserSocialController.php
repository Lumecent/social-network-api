<?php

namespace App\Http\Controllers\API\V1\User;

use App\Helpers\Answer;
use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\Social\DeleteSocialRequest;
use App\Http\Requests\User\Social\UserCreateSocialRequest;
use App\Http\Requests\User\Social\UserUpdateSocialRequest;
use App\Services\Service;

class UserSocialController extends BaseController
{
    /**
     * Create new social contact
     *
     * @param UserCreateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserCreateSocialRequest $request)
    {
        $result = Service::getInstance()->user->createSocial->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }

    /**
     * Update user social
     *
     * @param UserUpdateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateSocialRequest $request)
    {
        $result = Service::getInstance()->user->updateSocial->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
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

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }
}
