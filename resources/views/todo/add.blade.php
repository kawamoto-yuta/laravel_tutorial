@extends('layouts.common')
@section('content')
<h3>TODO新規登録</h3>
{{Form::open(['action' => 'TodoController@addPost', 'files' => true])}}

{{Form::label('title','タイトル')}}
{{Form::text('inputTitle', null, ['class' => 'form-control', 'placeholder' => 'タイトル'])}}

{{Form::label('additional','詳細')}}
{{Form::textarea('inputAdditional', null, ['class' => 'form-control', 'placeholder' => '詳細'])}}

{{Form::text('inputAdditional', 0, ['style' => 'display: none;'])}}

{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

{{Form::close()}}
@endsection
