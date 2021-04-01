@extends('layouts.common')
@section('content')

@if (session('add_message'))
    <div class="flash-title">
        <p>{{ session('add_message') }}</p>
    </div>
@endif
<div class="to_add">
    <a href="{{ action('TodoController@add') }}">TODO新規登録</a>
</div>
<h3>TODO一覧</h3>
{{Form::open(['action' => 'TodoController@statusChange', 'files' => true])}}
    {{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}
    <div class="todos" style="margin-top: 20px;">
        @foreach($incompletes as $incomplete)
            <div class="incompletes" style="margin-top: 20px;">
                <p>{{Form::checkbox('status', '1', false, ['class'=>'custom-control-input'])}}</p>
                <div class="title">{{ $incomplete->title }}</div>
                <div class="content">{{ $incomplete->content }}</div>
                <div class="updated_at">{{ $incomplete->updated_at }}</div>
            </div>
        @endforeach
        @foreach($completes as $complete)
            <div class="incompletes" style="margin-top: 20px; background-color: #dfdfdf">
                <p>{{Form::checkbox('status', '0', true, ['class'=>'custom-control-input'])}}</p>
                <div class="title">{{ $complete->title }}</div>
                <div class="content">{{ $complete->content }}</div>
                <div class="updated_at">{{ $complete->updated_at }}</div>
            </div>
        @endforeach
    </div>
{{Form::close()}}

@endsection
