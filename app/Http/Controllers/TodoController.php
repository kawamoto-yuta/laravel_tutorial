<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $incompletes = Todo::where('status', 0)->get();
        $completes = Todo::where('status', 1)->get();
        return view('todo/index', ['incompletes' => $incompletes, 'completes' => $completes]);
    }

    public function add()
    {
        return view('todo/add');
    }

    public function addPost(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->status = $request->status;
        $todo->save();
        return redirect()->action("TodoController@index")->with('add_message', '保存されました！');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo/edit', ['todo' => $todo]);
    }
}
