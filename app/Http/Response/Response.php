<?php

namespace App\Http\Response;
use Illuminate\Http\JsonResponse;

interface Response
{
    public function success($data = [], $code = 200): JsonResponse;

    public function fail($data = [], $code = 400): JsonResponse;
}
