@extends('layouts.common')
@section('content')
<p>新規登録</p>
@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif
{{Form::open(['action' => 'TodoController@addPost', 'files' => true])}}

{{Form::label('title','タイトル')}}
{{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'タイトル'])}}

{{Form::label('content','詳細')}}
{{Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '詳細'])}}

{{Form::text('status', 0, ['style' => 'display: none;'])}}
{{Form::text('place', "add", ['style' => 'display: none;'])}}

{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

{{Form::close()}}
@endsection
