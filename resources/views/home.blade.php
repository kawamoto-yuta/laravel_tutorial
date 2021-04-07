@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @elseif (session('not_success'))
    <div class="alert alert-danger">
        {{ session('not_success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">検索</div>
                <div class="card-body">
                    <form action="{{ url('/todo/search') }}" method="get">
                        <div class="">
                            <label>タイトル</label>
                            <input type="text" name="title" value="{{ $title ?? '' }}" class="form-control">
                        </div>
                        <div class="" style="margin-top: 10px;">
                            <label>詳細</label>
                            <textarea name="content" value="{{ $content ?? '' }}" class="form-control"></textarea>
                        </div>
                        <div style="margin-top: 10px;">
                            <label>ステータス</label><p style="margin:0;"></p>
                            <input type="checkbox" name="incomplete" value=0 class="form-check-input" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                未完了
                            </label>
                            <input type="checkbox" name="completed" value=1 class="form-check-input" id="flexCheckDefault" style="margin-left:15px;">
                            <label class="form-check-label" for="flexCheckDefault">
                                完了
                            </label>
                        </div>
                        <input type="submit" value="検索" class="btn btn-primary btn-block" style="margin-top: 20px;">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード</div>
                @if (session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
                @endif
                <div class="row">
                    @foreach($incompletes as $incomplete)
                    <div class="col-sm-4">
                        <a style="text-decoration:none; padding-bottom:5px;" href="{{ action('TodoController@show', ['id' => $incomplete->id]) }}'">
                            <div class="incompletes card" style="margin-top:20px; padding-top:5px;">
                                <div class="title" style="margin-left:15px; color:black;"><b>{{Str::limit($incomplete->title, 22, '…' )}}</b></div>
                                @if(!is_null($incomplete->content))
                                <div style="color:#bfbfbf; margin-left:15px;">{{Str::limit($incomplete->content, 24, '…' )}}</div>
                                @else
                                <div style="color:#00000000;">空白</div>
                                @endif
                                <div style="display:flex; justify-content:flex-end;">
                                    <a style="text-decoration: none; margin-right:5px;" href="{{ action('TodoController@edit', ['id' => $incomplete->id]) }}'">✏️</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @foreach($completes as $complete)
                    <div class="col-sm-4">
                        <a style="text-decoration:none; padding-bottom:5px;" href="{{ action('TodoController@show', ['id' => $complete->id]) }}'">
                            <div class="completes card" style="margin-top:20px; padding-top:5px; background-color: #dfdfdf">
                                <div class="title" style="margin-left:15px; color:black;"><b>✅ {{Str::limit($complete->title, 18, '…' )}}</b></div>
                                @if(!is_null($complete->content))
                                <div style="color:#bfbfbf; margin-left:15px;">{{Str::limit($complete->content, 24, '…' )}}</div>
                                @else
                                <div style="color:#00000000;">空白</div>
                                @endif
                                <div style="display:flex; justify-content:flex-end;">
                                    <a style="text-decoration: none; margin-right:5px;" href="{{ action('TodoController@edit', ['id' => $complete->id]) }}'">✏️</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
