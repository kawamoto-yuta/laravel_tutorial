<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //追加
use Illuminate\Http\Request;
use App\Todo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        $incompletes = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0)->get();
        $completes = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 1)->get();

        return view('home',compact('incompletes', 'completes'));
    }

    public function search(Request $request)
    {
        $in_c_query = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 0);
        $c_query = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->where('status', 1);
        
        $title = $request->input('title');
        $content = $request->input('content');
        $incomplete = $request->input('incomplete');
        $completed = $request->input('completed');
        
        // タイトル検索
        $in_c_query->where('title', 'like', '%'.$title.'%');
        $c_query->where('title', 'like', '%'.$title.'%');

        // 詳細の検索
        if(!is_null($content)){
            $in_c_query->where('content', 'like', '%'.$content.'%');
            $c_query->where('content', 'like', '%'.$content.'%');
        }
        
        $in_c_s_todos = $in_c_query->get();
        $c_s_todos = $c_query->get();

        if(is_null($incomplete) && is_null($completed) || !is_null($incomplete) && !is_null($completed)) {
            return view('todo.search', compact('in_c_s_todos', 'c_s_todos'));
        }elseif(is_null($incomplete)) {
            return view('todo.search', compact('c_s_todos'));
        }elseif(is_null($completed)) {
            return view('todo.search', compact('in_c_s_todos'));
        }
    }
}
