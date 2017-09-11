<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo();

        $todo->todo = $request->todo;

        $todo->save();

        Session::flash('success', 'Your todo is created!');

        return redirect()->route('todos');
    }

    public function update($id)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->todo = $request->todo;

        $todo->save();

        Session::flash('success', 'Your todo is updated!');

        return redirect()->route('todos');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success', 'Your todo was deleted!');

        return redirect()->route('todos');
    }

    public function completed($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 1;

        $todo->save();

        Session::flash('success', 'Your todo was mark completed!');

        return redirect()->route('todos');
    }
}
