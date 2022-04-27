<?php

namespace App;

class Response
{
    static public function responseOK($message)
    {
        $return['status'] = 1;
        $return['message'] = $message;

        return response()->json($return, 200);
    }

    static public function responseError($message)
    {
        $return['status'] = 0;
        $return['message'] = $message;

        return response()->json($return, 200);
    }

    static public function responseSuccess()
    {
        return response()->json(204);
    }

    static public function responseForbiden()
    {
        return response()->json(422);
    }

}
