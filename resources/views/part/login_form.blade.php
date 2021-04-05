@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif

<form method="post" action="{{ url('login') }}">
@csrf 

<div>
	ID: <input type="text" name="name" value="" />
</div>

<div>
	PASS: <input type="password" name="password" value="" />
</div>
<input type="submit" value="ログイン" />
<a href="{{ action('UserController@userAdd') }}">新規登録する</a>
</form>
