<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class AritclePayloadAction extends Controller
{
    public function __invoke(Request $request)
    {
        $resource = new ArticleResource(
            [  // DB에서 얻어낸 데이터 
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
        return $resource->response($request)->header(
            'content-type','application/hal+json'
        );
        
    }
    
}
