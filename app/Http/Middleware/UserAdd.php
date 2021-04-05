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
        if ($request->u_id == null || $request->password == null ) {
            return redirect("/userAddPost")->withErrors([
                "error" => "ID、パスワードは入力必須です。"
            ]);
        }elseif (!uniqu($request->u_id)){
            return redirect("/userAddPost")->withErrors([
                "error" => "そのIDはすでに使われています。"
            ]);
        }
        return $next($request);
    }
}
