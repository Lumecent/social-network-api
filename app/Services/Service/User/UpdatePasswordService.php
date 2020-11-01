<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\Security\UpdatePasswordRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService extends BaseService
{
    /**
     * Update user password
     *
     * @param UpdatePasswordRequest $request
     * @return mixed
     */
    public function run(UpdatePasswordRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $user->password = Hash::make($request->password);

        return $user->save();
    }
}
