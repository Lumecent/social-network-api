<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\Answer;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function response($success, $data = [], $codeSuccess = 200, $codeError = 400)
    {
        if ($success){
            return Answer::send('Success', $data, $codeSuccess);
        }

        return Answer::send('Error', [], $codeError);
    }
}
