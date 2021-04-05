<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SimpleLoginController extends Controller
{
    function login(Request $request){
		//入力内容をチェックする
		$name = $request->input("name");
		$password = $request->input("password");
		$user = User::where('name', $name)->first();
		// dd($user->password);
		//ログイン成功
		if($password == $user->password){
            session()->put("simple_auth", true);
			return redirect("/todo");
		}

		//ログイン失敗
		return redirect("/home")->withErrors([
			"login" => "ユーザーIDまたはパスワードが違います"
		]);
		
	}
}