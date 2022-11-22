<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers;

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

Route::get(
    '/', // 요청 URL
    function () { // Clouser 클로저 
    return view('welcome');// 헬퍼함수 (문자열)
    // 문자열: 프로젝트폴더/resources/views/문자열.blade.php
});

Route::get(   // GET /home요청 처리
    '/home',
    function(){
        return view('home');
        // Heredoc처리
    }
);

Route::get(
  '/register', // 요청 URL
	[App\Http\Controllers\RegisterController::class,'create']  // [컨트롤 클래스명::class,'실행메서드명']
)->middleware('guest')->name('register');

Route::post(
	'/register',
	[App\Http\Controllers\RegisterController::class,'store']
)->middleware('guest');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
    ->middleware('guest');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/user','App\Http\Controllers\UserController@index');
Route::post('/user','App\Http\Controllers\UserController@store');



/*
Route::HTTP요청메서드(
  요청URL,
  컨트롤러|액션|클로저  
)  
컨트롤러
  [클래스명::class, '처리메소드명']
  클래스명: ~~~Controller
  '클래스명@처리메소드명' 

액션
  [클래스명::class, '처리메소드명']
  클래스명: ~~~Action
  '클래스명@처리메소드명'  

처리메소드명 생략 ===> __invoke()메소드 실행  

클로져
  function(Request $req) {
    return response();
  } 


*/    

Route::get(
  '/uregist', // 요청 URL
	[App\Http\Controllers\UserController::class,'registview']  // [컨트롤 클래스명::class,'실행메서드명']
)->middleware('guest')->name('register');

Route::post(
	'/uregist',
	[App\Http\Controllers\UserController::class,'register']
)->middleware('guest');

Route::get(
  'text', App\Http\Controllers\TextAction::class
);

Route::get(
  'view', App\Http\Controllers\ViewAction::class
);

Route::get(
  'json', App\Http\Controllers\JsonAction::class
);
Route::get(
  'jsonp', App\Http\Controllers\JsonpAction::class
);

Route::get(
  'download', Controllers\DownloadAction::class
);

Route::get(
  'stream', Controllers\StreamAction::class
);


Route::get(
  'article', Controllers\AritclePayloadAction::class
);