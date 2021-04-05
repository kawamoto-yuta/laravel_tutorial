これはTOPです。

@if(session("simple_auth"))
<p>認証済です。</p>

<form method="post" action="{{ url('logout') }}">
@csrf 
<input type="submit" value="ログアウト" />
</form>
@else

@include("part.login_form")

@endif