<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublisherService;
use Symfony\Component\HttpFoundation\Response;

class PublisherAction // extends Controller
{
    private $publisher;

    public function __construct(PublisherService $publisher){
        $this->publisher = $publisher;
    }
    public function create(Request $req){
        if($this->publisher->exists($req->name)){
            return response ('OK',Response::HTTP_OK); // 200 응답
        }
        $id = $this->publisher->store($req->name, $req->address);
        return response('생성성공', Response::HTTP_CREATED)->header('Location','/api/publishers/'. $id);
          // 201 응답
    }
    
}
