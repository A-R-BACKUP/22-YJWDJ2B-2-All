<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($tasks as $task)
            <span>
                해야할일: {{$task['name']}} &nbsp;&nbsp;
                마감일: {{$task['due_date']}}
            </span>
            <br />
        @endforeach
        <br /><br /><br />
        @for ($i = 0;$i < count($tasks);$i++)
            <span>
                해야할일: {{$tasks[$i]['name']}} &nbsp;&nbsp;
                마감일: {{$tasks[$i]['due_date']}}
            </span>
            <br />
        @endfor
    </div>
    
</body>
</html>