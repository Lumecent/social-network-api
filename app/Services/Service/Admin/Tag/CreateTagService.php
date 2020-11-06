<?php

namespace App\Services\Service\Admin\Tag;

use App\Helpers\StringClean;
use App\Http\Requests\Admin\Tag\CreateTagRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Str;

class CreateTagService extends BaseService
{
    /**
     * Create a new tag
     *
     * @param CreateTagRequest $request
     * @return bool
     */
    public function run(CreateTagRequest $request)
    {
        $tag = Repository::getInstance()->tag->startConditions();

        $tag->name = Str::ucfirst(Str::lower(StringClean::cleanSpace($request->name)));

        return $tag->save();
    }
}
