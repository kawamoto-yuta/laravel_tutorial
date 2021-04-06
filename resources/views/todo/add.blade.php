@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="row justify-content-center" style="color:red;">
	<div class="col-md-8">
		<ul style="list-style: none;">
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">新規登録</div>
			<div class="card-body">
				{{Form::open(['action' => 'TodoController@addPost', 'files' => true])}}
				<div  style="margin-top: 15px;">
					{{Form::label('title','タイトル')}}
					{{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'タイトル'])}}
				</div>
				<div  style="margin-top: 15px;">
					{{Form::label('content','詳細')}}
					{{Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '詳細'])}}
				</div>
				{{Form::text('status', 0, ['style' => 'display: none;'])}}
				{{Form::text('place', "add", ['style' => 'display: none;'])}}
				{{Form::text('user_id', Auth::user()->id, ['style' => 'display: none;'])}}
				<div style="margin-top: 20px;">
					{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}
				</div>
				{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
