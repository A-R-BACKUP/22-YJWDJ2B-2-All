<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todo List</h1>
    <div><span>할일: </span>{{$task['task_name']}}</div>
    <div><span>기한: </span>{{$task['due_date']}}</div>
    <div><span>도구: </span>{{$task['comment'] . "1"}}</div>
    <div><span>도구: </span><?= $task['comment']  . "2"?></div>
    <div><span>도구: </span><?= htmlentities($task['comment'])  . "3" ?></div>
    <div><span>도구: </span>{!!$task['comment']   . "5" !!}</div>
</body>
</html>