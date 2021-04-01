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
<div class="todos" style="margin-top: 20px;">
    @foreach($todos as $todo)
        <div class="todo" style="margin-top: 20px;">
            <div class="title">{{ $todo->title }}</div>
            <div class="content">{{ $todo->content }}</div>
            <div class="updated_at">{{ $todo->updated_at }}</div>
        </div>
    @endforeach
</div>

@endsection
