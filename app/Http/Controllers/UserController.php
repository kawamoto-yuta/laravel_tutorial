<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userAdd()
    {
        return view('user/add');
    }

    public function userAddPost()
    {
        $user = new User;

        $user->u_id = $request->u_id;
        $user->password = $request->password;
        $user->save();
        return redirect()->action("TodoController@index")->with('message', '保存されました！');
    }

}
