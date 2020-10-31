<?php

namespace App\Services\Service\User;

use App\Helpers\StringClean;
use App\Http\Requests\User\Profile\UserProfileRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Str;

class UpdateProfileService extends BaseService
{
    /**
     * Update user profile
     *
     * @param UserProfileRequest $request
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function run(UserProfileRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $user->alias = Str::lower(StringClean::cleanSpace($request->alias));
        $user->info = $request->info;
        $user->date_bd = $request->date_bd;

        return $user->save();
    }
}
