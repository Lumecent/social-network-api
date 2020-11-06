<?php

namespace App\Services\Service\Admin\Tag;

use App\Helpers\StringClean;
use App\Http\Requests\Admin\Tag\UpdateTagRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Str;

class UpdateTagService extends BaseService
{
    /**
     * Update tag
     *
     * @param UpdateTagRequest $request
     * @return bool
     */
    public function run(UpdateTagRequest $request)
    {
        $tag = Repository::getInstance()->tag->findById($request->id);

        $tag->name = Str::ucfirst(Str::lower(StringClean::cleanSpace($request->name)));

        return $tag->save();
    }
}
