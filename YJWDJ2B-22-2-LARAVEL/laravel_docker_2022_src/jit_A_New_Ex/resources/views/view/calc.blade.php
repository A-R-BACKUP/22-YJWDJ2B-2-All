<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @unless(Auth::check())
      로그인 필요!!!
    @endunless
    <h1>블레이드 조건문</h1>
    @if($num > 22)
      <p>{{$num}}년은 22년도보다 미래입니다.</p>
    @else
      <p>{{$num}}년은 22년도보다 과거입니다.</p>
    @endif

    
</body>
</html>