<?php

namespace App\Services\Service\User\Cover;

use App\Helpers\PreparingFileSystem;
use App\Http\Requests\User\Profile\UpdateCoverRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UpdateCoverService extends BaseService
{
    /**
     * Update user cover
     *
     * @param UpdateCoverRequest $request
     * @return false|\Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \ErrorException
     */
    public function run(UpdateCoverRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $cover = $this->saveCoverInFileSystem(
            $user->cover,
            $request->cover,
            70
        );

        if ($cover) {
            $user->cover = $cover;

            return $user->save();
        }

        return false;
    }

    /**
     * Save user cover in file system
     *
     * @param string $cover
     * @param string $imageStr
     * @param int $quality
     * @return false|string
     * @throws \ErrorException
     */
    protected function saveCoverInFileSystem(string $cover, string $imageStr, int $quality)
    {
        PreparingFileSystem::prepareForUser($cover, 'cover.jpg');

        $imageName = Str::random(10) . ".jpg";
        $uploadName = "images/users/{$imageName}";

        list(, $imageStr) = explode(',', $imageStr);

        $image = imagecreatefromstring(base64_decode($imageStr));

        if (Image::make($image)->save($uploadName, $quality, 'jpg')){
            return $imageName;
        }

        return false;
    }
}
