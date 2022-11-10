@extends('layouts.master')
@section('title')
  레이아웃 테스트 화면
@endsection

@section('body_content')
  <table class="table">
    <thead>
        <tr>
            <th>할일</th>
            <th>기한</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task['task_name']}}</td>
                <td>{{$task['due_date']}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
