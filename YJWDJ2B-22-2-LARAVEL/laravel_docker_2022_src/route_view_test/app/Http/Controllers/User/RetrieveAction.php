<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use stdClass;

final class RetrieveAction extends Controller
{
    private $authManager;

    public function __construct(
        AuthManager $authManager
    ) {
        $this->authManager = $authManager;
    }

    public function __invoke(Request $request)
    {
        /** @var User $user */
       // $user = $this->authManager->guard('jwt')->user();
       $user = $this->authManager->setToken($request->bearerToken())->user();

       return $user;
        
    }
}
