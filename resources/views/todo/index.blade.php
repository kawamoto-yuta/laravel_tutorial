@extends('layouts.common')
@section('content')
@if (session('add_message'))
    <div class="flash-title">
        <p>{{ session('add_message') }}</p>
    </div>
@endif
<h3>TODO一覧</h3>
<div class="to_add">
    <a href="{{ action('TodoController@add') }}">TODO新規登録</a>
</div>    

@endsection
