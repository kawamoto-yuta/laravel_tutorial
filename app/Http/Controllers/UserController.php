<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function userAdd()
    {
        return view('user/add');
    }

    public function userAddPost(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->action("SimpleLoginController@login");
    }

}
