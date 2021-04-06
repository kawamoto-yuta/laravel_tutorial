@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                <div class="">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
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
