<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //追加
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
        if(Auth::user()->id == $todo->user_id) {
            return view('todo/show', ['todo' => $todo]);
        }else{
            return redirect('home')->with('message', 'そのページには遷移できません。');
        }
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if(Auth::user()->id == $todo->user_id) {
            return view('todo/edit', ['todo' => $todo]);
        }else{
            return redirect('home')->with('message', 'そのページには遷移できません。');
        }
    }

    public function editPost(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->status = $request->status;  
        $todo->save();
        return redirect()->action("TodoController@index")->with('message', '保存されました！');
    }

    public function destory($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect('home')->with('message', '削除しました！');
    }
}
