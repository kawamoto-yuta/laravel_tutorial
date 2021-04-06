<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\User;

class TodoController extends Controller
{
    public function index()
    {
        $incompletes = Todo::where('status', 0)->where('user_id', $user_id)->get();
        $completes = Todo::where('status', 1)->where('user_id', $user_id)->get();
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
        $todo->user_id = $request->user_id;
        $todo->save();
        return redirect()->action("TodoController@index")->with('message', '保存されました！');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo/show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo/edit', ['todo' => $todo]);
    }

    public function editPost(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->status = $request->status;
        
        // $todo->title = $request->input('title');
        // $todo->content = $request->input('content');
        // $todo->status = $request->input('status');
        $todo->save();
        return redirect()->action("TodoController@index")->with('message', '保存されました！');
    }
}
