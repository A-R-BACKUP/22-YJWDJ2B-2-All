<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

use function response;

class JsonpAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        // $response = Response::jsonp('callback', ['status' => 'success']);
        
        $response = response()->jsonp('callback', ['status' => 'success']);
        return $response;
    }
}
