<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UserAdd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->name == null || $request->password == null || $request->email == null ) {
            return redirect("/userAddPost")->withErrors([
                "error" => "名前、メール、パスワードは入力必須です。"
            ]);
        // }elseif (!unique($request->name)){
        //     return redirect("/userAddPost")->withErrors([
        //         "error" => "その名前はすでに登録されています。"
        //     ]);
        }
        return $next($request);
    }
}
