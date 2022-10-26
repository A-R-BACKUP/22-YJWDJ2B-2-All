<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

use function response;

class TextAction extends Controller
{
    //
    public function __invoke(Request $request): IlluminateResponse
    {
        //$response = Response::make('hello world 1');  // 파사드 이용
        
        //$response = response('hello world 2');   // 헬퍼함수 이용 1
        // content-type 변경
        $response = response(                  // 헬퍼함수 이용 2
            'hello world 3',
            IlluminateResponse::HTTP_OK,
            [
                'content-type' => 'text/plain'
            ]
        );
        return $response;
    }
}
