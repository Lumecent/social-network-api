<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\LoginRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class LoginService extends BaseService
{
    public function run(LoginRequest $request)
    {
        $user = Repository::getInstance()->user->findByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)){
            return false;
        }

        return $user;
    }
}
