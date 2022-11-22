<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$var1['name']}}</title>
</head>
<body>
    {{csrf_field()}}
    <h1>{{$var1['name']}}</h1>
    <div>
        날짜: {{$var1['date']}}
        글: {{$var1['comment']}} // < --> &lt;, > --> &gt; : 새너타이징 
        글1: <?= $var1['comment'] ?> 
        <!--  XSS 공격 방법 대응 불가 -->
        글1-1: <?php echo htmlentities($var1['comment']) ?>
        글2: {{!! $var1['comment'] !!}} <!--  XSS 공격 방법 대응 불가 -->
    </div>
    
</body>
</html>