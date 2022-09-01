<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // Closure 클로저
    return view('welcome'); // view는 헬퍼 함수
});

Route::get('/home', function () {
    return view('home'); // home.blade.php 파일
});

Route::get(
    '/register',
    [App\Http\Controllers\RegisterController::class,'create']
    //[컨트롤러클래스명::class, 메서드명]
)->middleware('guest') -> name('register');
Route::post(
    '/register',
    [App\Http\Controllers\RegisterController::class,'store']
)->middleware('guest');
