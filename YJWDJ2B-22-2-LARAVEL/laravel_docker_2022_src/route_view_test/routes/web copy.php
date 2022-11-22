<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ABCController;

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

Route::get('/', function () {
  return view('welcome');
});

// Route::get(
//   'home',
//   function(){  // 클로저 Closure
//     return '안녕하세요?';
//   }
// );

Route::get(
  'home/my',
  function(){  // 클로저 Closure
    return '안녕하세요? 저는 JIT입니다.';
  }
);

// Route::get(
//   'home/{name}',
//   function($name){  // 클로저 Closure
//     return '안녕하세요? 저는 ' . $name .  '입니다.';
//   }
// );

// Route::get(
//   'home/{name?}',
//   function($name="TEST"){  // 클로저 Closure
//     return '안녕하세요? 저는 ' . $name .  '입니다.';
//   }
// );

// Route::pattern('name','[0-9a-zA-Z]{3}');
// Route::get(
//   'home/{name?}',
//   function($name="TEST"){  // 클로저 Closure
//     return '안녕하세요? 저는 ' . $name .  '입니다.';
//   }
// );

// Route::get(
//   'home/{name?}',
//   function($name="TEST"){  // 클로저 Closure
//     return '안녕하세요? 저는 ' . $name .  '입니다.';
//   }
// )->where('name','[0-9a-zA-Z@]{5}');

Route::get(
  'home/{name?}',
  [ 'as' => 'testhome',
    function($name="TEST"){  // 클로저 Closure
      return '안녕하세요? 저는 ' . $name .  '입니다.';
    }
  ]
);

Route::get(
  'mytesthome/{param?}',
  function($param='JIT'){
    return redirect(route('testhome',['name' => $param]));  // redirect(), route() 헬퍼함수
  }

);

Route::get(
  'home1/html',
  [ 'as' => 'homehtml',
    function(){  // 클로저 Closure
      $html = <<<HTML
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>라라벨 Heredoc 테스트</h1>
    <h2>단디 해보자. </h2>
</body>
</html>

HTML;

      return $html;
    }
  ]
);

// Route::get(
//   'task/view/{param?}',
//   function($param='default'){
//     $task = [  // 본래는 DB처리
//       'task_name'=> '오늘 할일 1',
//       'due_date' => '2022-10-20 13:00:00',
//       'trans_data' => $param,
//     ];  
//     return view('task.view',compact('task'));
//   }
// );

Route::get(
  'task/view/{param?}',
  function($param='default'){
    $task_new = [  // 본래는 DB처리
      'task_name'=> '오늘 할일 1',
      'due_date' => '2022-10-20 13:00:00',  
      'trans_data' => $param,   
    ];  
    return view('task.view')->with('task',$task_new)->with('trans_data',$param);
  }
);

Route::get(
  'task/alert',
  function(){
    $taskNew = [  // 본래는 DB처리
      'task_name'=> '라라벨 중간고사 대비 연습',
      'due_date' => '2022-10-20 16:00:00',  
      'comment' => '<script>window.alert("안녕 일본IT 화이팅");</script>',   
    ];  
    return view('task.alert')->with('task',$taskNew);
  }
);

Route::get(
  'testif/{param?}',
  function($param=0){
    return view('task/testif')->with('num',$param);
  }
);


Route::get(
  'testfor/{param?}',
  function($param=0){
    $tasks = [
      [ 'task_name'=> '라라벨 중간고사 대비 연습',
        'due_date' => '2022-10-20 16:00:00',  
      ],
      [ 'task_name'=> '블레이드 반복문 연습',
      'due_date' => '2022-10-20 18:00:00',  ],
    ];
    return view('task/testfor')->with('tasks',$tasks);
  }
);


Route::get(
  'testlayout/{param?}',
  function($param=0){
    $tasks = [
      [ 'task_name'=> '라우팅 연습',
        'due_date' => '2022-10-20 19:45:00',  
      ],
      [ 'task_name'=> '블레이드 연습',
      'due_date' => '2022-10-20 20:40:00',  ],
      [ 'task_name'=> '빡지(feat 이동현)',
      'due_date' => '2022-10-20 21:30:00',  ],
    ];
    return view('task/testlayout')->with('tasks',$tasks);
  }
);

Route::resource('abc', \App\Http\Controllers\ABCController::class);