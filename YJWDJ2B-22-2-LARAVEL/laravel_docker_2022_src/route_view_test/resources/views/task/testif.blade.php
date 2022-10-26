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
      <p>로그인이 필요합니다.</p>
      {{redirect(route('testhome'))}}
    @endunless
        
    <h1> @ if 테스트 </h1>
    @if($num>19)
      <p>{{$num}}은 성인입니다.</p>
    @else
      <p>{{$num}}은 미성년입니다.</p>
    @endif



</body>
</html>