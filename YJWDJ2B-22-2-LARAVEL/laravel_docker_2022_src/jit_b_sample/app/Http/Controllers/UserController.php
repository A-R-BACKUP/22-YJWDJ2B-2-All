<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory as ViewFactory;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(Request $req): ViewFactory{
        return view('user.index');
    }
    public function store(Request $req): RedirectResponse{

    }
}
