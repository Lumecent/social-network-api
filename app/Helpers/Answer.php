<?php

namespace App\Helpers;

class Answer
{
    public static function send($message = null, $data = [], $code = null)
    {
        $response = ['message' => $message];

        if ($code && $code < 400) {
            $response = array_merge($response, ['data' => $data]);
        }else{
            $response = array_merge($response, ['errors' => $data]);
        }

        return response()->json($response, $code);
    }
}
