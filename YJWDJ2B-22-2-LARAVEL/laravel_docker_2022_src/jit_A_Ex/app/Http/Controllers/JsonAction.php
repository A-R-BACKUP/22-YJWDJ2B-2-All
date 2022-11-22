<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use function response;

class JsonAction extends Controller
{
    //
    public function __invoke(Request $request): JsonResponse
    {
        // $response = Response::json(['status' => 'success']);
        $res_json1  = $request->get('message');
        $res_json2  = $request->json('nested');

        //레이어드 구현

        $response = response()->json([
            'status' => 'success', 
            'message'=>$res_json1, 
            'nested'=>$res_json2,
            ]
        );
        return $response;
    }
}
