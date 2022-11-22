<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;
use function response;


class TextAction extends Controller
{
    //
    public function __invoke(Request $req): IlluminateResponse 
    {
        //$response = Response::make('hello YJU Japan IT 1 '); // 파사드 이용
        //$response = response('hello YJU Japan IT 2');   // 헬퍼함수
        $response = response(      // 헬퍼함수+응답코드+응답헤더
                      'hello YJU Japan IT 3 한글임',  // 응답내용
                      IlluminateResponse::HTTP_OK,// 응답코드
                      [  // 응답헤더(배열)
                        'content-type' =>'text/plain; charset=UTF-8'
                      ]
                    );
        return $response;            

    }
}
