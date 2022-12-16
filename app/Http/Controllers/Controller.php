<?php

// /////////////////////////////////////////////////////////////////////////////
// PLEASE DO NOT RENAME OR REMOVE ANY OF THE CODE BELOW. 
// YOU CAN ADD YOUR CODE TO THIS FILE TO EXTEND THE FEATURES TO USE THEM IN YOUR WORK.
// /////////////////////////////////////////////////////////////////////////////

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ResponseSuccess($data, $message = "Successful", $statusCode = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status-code'  => $statusCode,
            'success'      => true,
            'message'      => $message,
            'data'         => $data,
        ]);
    }

    public  function ResponseError($message = 'Something went wrong!', $statusCode = ResponseAlias::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json([
            'status-code'  => $statusCode,
            'success'      => false,
            'message'      => $message,
        ]);
    }
}
