@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if (session('message'))
                    <div class="">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="">
                    <a href="{{ action('TodoController@add') }}">TODO新規登録</a>
                </div>
                <div class="" style="margin-top: 20px;">
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
                        <div class="completes" style="margin-top: 20px; background-color: #dfdfdf">
                            <div class="title">✅ {{ $complete->title }}</div>
                            <div class="content">{{ $complete->content }}</div>
                            <div class="updated_at">{{ $complete->updated_at }}</div>
                            <a href="{{ action('TodoController@show', ['id' => $complete->id]) }}'">詳細</a>
                            <a href="{{ action('TodoController@edit', ['id' => $complete->id]) }}'">編集</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
