<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function sendResponse($result ,$message,$status=200)
    {
        $data = [
            'success' => true,
            'message' => $message,
            'data' => $result,
            'errors' => null ,
            'status' =>$status

        ];
        return response()->json($data);
    }

    public function sendError($errors, $message="Validation Failed",$status=401)
    {
        $data = [
            'success' => false,
            'message' => $message?: implode(', ', $errors),
            'data' => null,
            'errors' => $errors ,
            'status' =>$status
        ];
        return response()->json($data);

    }
}
