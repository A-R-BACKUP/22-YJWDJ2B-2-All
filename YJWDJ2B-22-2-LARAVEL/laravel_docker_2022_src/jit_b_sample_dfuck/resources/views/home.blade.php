<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset='utf-8'>
    <title>Main Page</title>
</head>
<body>
<p>LARAVE Main Page
    @if (Auth::check())
        {{ \Auth::user()->name }}님</p>
<p><a href="/logout">로그아웃</a></p>
@else
    게스트님</p>
    <p><a href="/login">로그인</a><br><a href="/register">회원 등록</a></p>
@endif
</body>
</html>
