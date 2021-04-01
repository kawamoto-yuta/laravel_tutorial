@extends('layouts.common')
@section('content')
<h3>TODO一覧</h3>
<div class="to_add">
    <a href="{{ action('TodoController@add') }}">TODO新規登録</a>
</div>    

@endsection
