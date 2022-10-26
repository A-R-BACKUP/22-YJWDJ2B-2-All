<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($tasks as $task)
      <p>할일: 
        <span>
             <b>
             {{ $task['task_name'] }}
             </b>
        </span><br/>
      </p>
      <p>마감일: 
        <span>
             <b>
             {{ $task['due_date'] }}
             </b>
        </span><br/>
      </p>
    @endforeach

    @for($i=0;$i<count($tasks);$i++)
      <p><h3>할일:</h3> 
        <span>
             <b>
             {{ $task['task_name'] }}
             </b>
        </span><br/>
      </p>
      <p><i>마감일:</i> 
        <span>
             <b>
             {{ $task['due_date'] }}
             </b>
        </span><br/>
      </p>
    @endfor
</body>
</html>