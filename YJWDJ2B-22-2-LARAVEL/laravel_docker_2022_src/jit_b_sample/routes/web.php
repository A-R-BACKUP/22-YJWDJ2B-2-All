<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () { // Clouser 클로저
    return view('welcome');  // view 헬퍼함수, welcom.blade.php 파일 처리
});

Route::get('/home',function(){
    return view('home');  // home.blade.php 파일 
});

Route::get(
    '/register',   // 요청 주소
    [App\Http\Controllers\RegisterController::class,'create']
    // [컨트롤러클래스명::class, 메서드명]
)->middleware('guest')->name('register');
Route::post(
    '/register',
    [App\Http\Controllers\RegisterController::class,'store']
)->middleware('guest');

Route::get(
    '/login',
    [App\Http\Controllers\LoginController::class,'index']
)->middleware('guest')->name('login');

Route::post(
    '/login',    
    'App\Http\Controllers\LoginController@authenticate'
    //[App\Http\Controllers\LoginController::class,'authenticate']
)->middleware('guest');

Route::get(
    '/logout',
    [App\Http\Controllers\LoginController::class,'logout']
)->middleware('auth')->name('logout');


/*
Route::HTTP요청메소드(
    요청URL,
    클로저, 컨트롤러
)

클로저: 
  function(Reqeust $req){ return 응답객체;}

컨트롤러
  [클래스명::class,'메소드명']  ==> 클래스: 컨트롤러 클래스 (~~~Controller)
  '클래스명@메소드명'

  [클래스명::class,] ===> 클래스: 액션 클래스 (~~~Action)
  '클래스명'        ===> 클래스에 작성되어 있는 __invoke메소드 실행



*/

Route::get('/user', ['App\Http\Controllers\UserController::class', 'index']);
//Route::post('/user', ['App\Http\Controllers\UserController::class', 'store']);
Route::post('/user', 'App\Http\Controllers\UserController@store');
// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/user', ['UserController::class', 'index']);
//     Route::post('/user', ['UserController::class', 'store']);
    
// });
Route::get('/uregist','App\Http\Controllers\UserController@create');
Route::post('/uregist','App\Http\Controllers\UserController@register');

Route::get('text', Controllers\TextAction::class);
Route::get('json', Controllers\JsonAction::class);
Route::get('download', Controllers\DownloadAction::class);
Route::get('stream', Controllers\StreamAction::class);
Route::get('article', Controllers\ArticlePayloadAction::class);