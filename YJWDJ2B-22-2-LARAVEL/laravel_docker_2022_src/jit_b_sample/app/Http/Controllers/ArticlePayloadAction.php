<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticlePayloadAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {

        // DB 처리: 모델처리
        
        $resource = new ArticleResource(
            [  // DB로부터 얻어낸 결과값 예시
                'id' => 1,
                'title' => 'Laravel REST API',
                'comments' => [
                    [
                        'id' => 2134,
                        'body' => 'awesome!',
                        'user_id' => 133345,
                        'user_name' => 'Application Developer',
                    ]
                ],
                'user_id' => 13255,
                'user_name' => 'User1'
            ]
        );
        return $resource->response($request)
            ->header('content-type', 'application/hal+json');
    }
}
