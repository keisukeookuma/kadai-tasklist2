@extends('layouts.app')

@section('content')
    <h1>タスクリスト一覧</h1>
    
@if (Auth::check())
    @if (count($tasks) > 0)
        <!--<ul>
            @foreach ($tasks as $task)
            <li>{!! link_to_route('tasks.show', $task->id, ['id'=> $task->id]) !!} : {{ $task->content }}>{{ $task->status }}</li>
            @endforeach
        </ul>-->
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('tasks.create', '新規タスクの投稿',null,['class'=>'btn btn-primary']) !!}
    

@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist</h1>
            {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>    
@endif
    
@endsection