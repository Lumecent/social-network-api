<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AuthController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $user = Service::getInstance()->user->register->run($request);
        $token = null;

        if ($user){
            $token = $user->createToken($user->alias)->plainTextToken;
        }

        return $this->response($user, compact('user', 'token'));
    }

    public function login(LoginRequest $request)
    {
        $user = Service::getInstance()->user->login->run($request);
        $token = null;

        if ($user){
            $token = $user->createToken($user->alias)->plainTextToken;

            return $this->response($user, compact('user', 'token'));
        }

        return $this->response(false, ['email' => 'Введенные учетные данные неверны'], 200, 422);
    }

    public function logout()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $user->tokens->each->delete();

        return $this->response(true);
    }
}
