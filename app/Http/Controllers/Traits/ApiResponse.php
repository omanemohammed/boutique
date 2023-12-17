<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Response;

trait ApiResponse {
    function noContentResponse($data = []) {
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}