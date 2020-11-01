<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\Social\UserUpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateSocialService extends BaseService
{
    /**
     * Update user social
     *
     * @param UserUpdateSocialRequest $request
     * @param $socialID
     */
    public function run(UserUpdateSocialRequest $request, $socialID)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $social = Repository::getInstance()->userSocial->findByUpdate($socialID, $user->id);

        $social->social = $request->social;
        $social->url = $request->url;

        return $social->save();
    }
}
