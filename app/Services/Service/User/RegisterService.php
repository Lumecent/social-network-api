<?php

namespace App\Services\Service\User;

use App\Helpers\StringClean;
use App\Http\Requests\User\RegisterRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterService extends BaseService
{
    /**
     * Registration new users
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function run(RegisterRequest $request)
    {
        DB::beginTransaction();

        $user = Repository::getInstance()->user->startConditions();

        $user->name = StringClean::cleanSpace($request->name);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alias = 'id-' . mt_rand();
        $user->avatar = 'avatar.jpg';
        $user->cover = 'cover.jpg';
        $user->save();

        DB::commit();

        return $user;
    }
}
