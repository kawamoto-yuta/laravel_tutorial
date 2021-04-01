@extends('layouts.common')
@section('content')
<h3>TODO新規登録</h3>
{{Form::open(['action' => 'TodoController@addPost', 'files' => true])}}

{{Form::label('title','タイトル')}}
{{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'タイトル'])}}

{{Form::label('content','詳細')}}
{{Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '詳細'])}}

{{Form::text('status', 0, ['style' => 'display: none;'])}}

{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

{{Form::close()}}
@endsection
