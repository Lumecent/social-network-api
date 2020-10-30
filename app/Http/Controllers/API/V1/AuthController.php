<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = Service::getInstance()->user->register->run($request);

        if ($user){
            $token = $user->createToken($user->alias)->plainTextToken;

            return Answer::send('Success', compact('user', 'token'), 200);
        }

        return Answer::send('Error', [], 400);
    }

    public function login(UserLoginRequest $request)
    {
        $user = Service::getInstance()->user->login->run($request);

        if ($user){
            $token = $user->createToken($user->alias)->plainTextToken;

            return Answer::send('Success', compact('user', 'token'), 200);
        }

        return Answer::send('Error', ['email' => 'Введенные учетные данные неверны'], 422);
    }

    public function logout()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $user->tokens->each->delete();

        return Answer::send('Success', [], 200);
    }
}
