@extends('layouts.common')
@section('content')

@if (session('message'))
    <div class="">
        <p>{{ session('message') }}</p>
    </div>
@endif
<div class="">
    <a href="{{ action('TodoController@add') }}">TODO新規登録</a>
</div>
<p>一覧</p>
<div class="todos" style="margin-top: 20px;">
    @foreach($incompletes as $incomplete)
        <div class="incompletes" style="margin-top: 20px;">
            <div class="title">{{ $incomplete->title }}</div>
            <div class="content">{{ $incomplete->content }}</div>
            <div class="updated_at">{{ $incomplete->updated_at }}</div>
            <a href="{{ action('TodoController@show', ['id' => $incomplete->id]) }}'">詳細</a>
            <a href="{{ action('TodoController@edit', ['id' => $incomplete->id]) }}'">編集</a>
        </div>
    @endforeach
    @foreach($completes as $complete)
        <div class="incompletes" style="margin-top: 20px; background-color: #dfdfdf">
            <div class="title">✅ {{ $complete->title }}</div>
            <div class="content">{{ $complete->content }}</div>
            <div class="updated_at">{{ $complete->updated_at }}</div>
            <a href="{{ action('TodoController@show', ['id' => $complete->id]) }}'">詳細</a>
            <a href="{{ action('TodoController@edit', ['id' => $complete->id]) }}'">編集</a>
        </div>
    @endforeach
</div>

@endsection
