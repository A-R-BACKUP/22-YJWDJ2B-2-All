<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PublisherService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublisherAction
{

    private $publisher;

    public function __construct(PublisherService $publisher)
    {
        $this->publisher = $publisher;
    }

    public function create(Request $request)
    {
        if ($this->publisher->exists($request->name)) {
            return response('작업OK', Response::HTTP_OK);  // 200 응답
        }

        $id = $this->publisher->store($request->name, $request->address);
        return response('작업성공', Response::HTTP_CREATED)  // 201 응답
            ->header('Location', '/api/publishers/' . $id);
    }

}