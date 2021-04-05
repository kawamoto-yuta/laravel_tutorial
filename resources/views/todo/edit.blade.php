@extends('layouts.common')
@section('content')
<p>編集</p>
@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif
{{Form::open(['action' => 'TodoController@editPost', 'files' => true])}}

{{Form::label('title','タイトル')}}
{{Form::text('title', $todo->title, ['class' => 'form-control'])}}

{{Form::label('content','詳細')}}
{{Form::textarea('content', $todo->content, ['class' => 'form-control'])}}

{{Form::radio('status', 0, (old('status')== 0 ? true: ($todo->status == 0))? true:false, ['class' => 'circle'])}}
<span class="radio-button__icon">未完了</span>
{{Form::radio('status', 1, (old('status')== 1 ? true: ($todo->status == 1))? true:false, ['class' => 'circle'])}}
<span class="radio-button__icon">完了</span>

{{Form::text('place', "edit/{$todo->id}", ['style' => 'display: none;'])}}
{{Form::text('id', "{$todo->id}", ['style' => 'display: none;'])}}

{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

{{Form::close()}}
@endsection
