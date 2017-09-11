@extends('layout')

@section('content')
    <div class="row justify-content-lg-center">
        <div class="col-lg-8 todo-input">
            <h5 class="display-4">Please write your todo:</h5>
            <form action="/create/todo" method="post">
                {{ csrf_field() }}
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="todo" placeholder="Create a new todo">
                </div>
            </form>
        </div>
        <div class="col-lg-8 text-center">
            @foreach($todos as $key => $todo)
                <p class="lead">
                    {{ ++$key }}. {{ $todo->todo }}
                    <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info">update</a>
                    <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">x</a>
                    @if(!$todo->completed)
                        <a href="{{ route('todos.completed', ['id' => $todo->id]) }}" class="btn btn-success">Mark as completed!</a>
                    @else
                        <span class="text-seccess">Completed!</span>
                    @endif
                </p>
                <hr>
            @endforeach
        </div>
    </div>
@stop