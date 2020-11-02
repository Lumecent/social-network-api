<?php

namespace App\Services\Service\User;

use App\Helpers\PreparingFileSystem;
use App\Http\Requests\User\Profile\UpdateAvatarRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UpdateAvatarService extends BaseService
{
    /**
     * Update avatar user
     *
     * @param UpdateAvatarRequest $request
     * @return false|\Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \ErrorException
     */
    public function run(UpdateAvatarRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $avatar = $this->saveAvatarInFileSystem(
            $user->avatar,
            $request->avatar,
            400,
            400,
            80
        );

        if ($avatar) {
            $user->avatar = $avatar;

            return $user->save();
        }

        return false;
    }

    /**
     * Save user avatar in file system
     *
     * @param string $avatar
     * @param string $imageStr
     * @param integer $width
     * @param integer $height
     * @param integer $quality
     * @return false|string
     * @throws \ErrorException
     */
    protected function saveAvatarInFileSystem(string $avatar, string $imageStr, int $width, int $height, int $quality)
    {
        PreparingFileSystem::prepareForUser($avatar, 'avatar.jpg');

        $imageName = Str::random(10) . ".jpg";
        $uploadName = "images/users/{$imageName}";

        list(, $imageStr) = explode(',', $imageStr);

        $image = imagecreatefromstring(base64_decode($imageStr));

        if (Image::make($image)->resize($width, $height)->save($uploadName, $quality, 'jpg')){
            return $imageName;
        }

        return false;
    }
}
