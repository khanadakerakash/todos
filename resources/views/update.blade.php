@extends('layout')

@section('content')
    <div class="row justify-content-lg-center">
        <div class="col-lg-8 todo-input">
            <h5 class="display-4">Please write your todo:</h5>
            <form action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="todo" value="{{ $todo->todo }}" placeholder="Create a new todo">
                </div>
            </form>
        </div>
    </div>
@stop