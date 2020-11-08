<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseLoginController extends Controller
{
    //
    public function responseOk($result, $code =200, $message = 'success')
    {
        $response = [
            'code' => $code,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, $code);
    }
    public function responseError($error, $code = 422, $errorDetails = [])
    {
        $response = [
            'code' => $code,
            'error' => $error
        ];
        if (!empty($errorDetails)) {
            $response['errorDetails']= $errorDetails;
        }
        return response()->json($response, $code);
    }
}
