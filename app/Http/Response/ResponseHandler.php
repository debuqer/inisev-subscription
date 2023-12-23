<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class ResponseHandler implements Response
{

    public function success($data = [], $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $code);
    }

    public function fail($data = [], $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $data,
        ], $code);
    }
}
