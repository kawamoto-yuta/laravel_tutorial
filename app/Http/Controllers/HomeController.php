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
        $incompletes = Todo::orderBy('created_at', 'desc')->where('status', 0)->where('user_id', Auth::user()->id)->get();
        $completes = Todo::orderBy('created_at', 'desc')->where('status', 1)->where('user_id', Auth::user()->id)->get();

        return view('home',compact('incompletes', 'completes'));
    }
}
