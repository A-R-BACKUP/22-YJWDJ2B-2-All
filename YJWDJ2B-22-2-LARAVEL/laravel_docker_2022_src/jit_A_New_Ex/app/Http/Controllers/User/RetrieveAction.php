<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;

use Illuminate\Contracts\Auth\Access\Gate;

class RetrieveAction extends Controller
{
  private $authManager;
  private $gate;

  public function __construct(AuthManager $authManager, Gate $gate){
    $this->authManager = $authManager;
    $this->gate = $gate;
  }
  public function __invoke(Request $request){
    // $this->authManager->setToken($request->bearerToken()->user());
    $user = null;
    if ($this->gate->allows('user-access', $id)) {
      $user = $this->authManager->guard('jwt')->user();
    }

    return  $user
  }
}
