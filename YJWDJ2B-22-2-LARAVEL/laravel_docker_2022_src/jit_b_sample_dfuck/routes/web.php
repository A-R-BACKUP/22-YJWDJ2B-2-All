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

/*
Route::HTTP요청메소드(
    요청URL
    클로저, 컨트롤러
)

클로저:
    function(Request $req){ return 응답객체; }

컨트롤러
    [클래스명::class,'메소드명']
    '클래스명@메소드명'

    [클래스명::class]   ===> 클래스: 액션 클래스 (~~Action)
    '클래스명'   ===> 클래스에 작성되어 있는 __invoke메소드 실행
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

Route::get(
    '/login',
    [App\Http\Controllers\LoginController::class,'index']
)->middleware('guest')->name('login');

Route::post(
    '/login',
//    [App\Http\Controllers\LoginController::class,'authenticate'] 아래와 같이 축약 할 수 있다.
    'App\Http\Controllers\LoginController@authenticate'
)->middleware('guest');

Route::get(
    '/logout',
    [\App\Http\Controllers\LoginController::class,'logout']
)->middleware('auth')->name('logout');
