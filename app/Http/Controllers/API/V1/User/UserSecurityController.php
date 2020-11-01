<?php

namespace App\Http\Controllers\API\V1\User;

use App\Helpers\Answer;
use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\User\Security\UpdatePasswordRequest;
use App\Services\Service;

class UserSecurityController extends BaseController
{
    /**
     * Update user password
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $result = Service::getInstance()->user->updatePassword->run($request);

        if ($result){
            return Answer::send('Success', [], 200);
        }

        return Answer::send('Error', [], 400);
    }
}
