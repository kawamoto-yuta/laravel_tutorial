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
			<div class="card-header">編集</div>
			<div class="card-body">
			{{Form::open(['action' => 'TodoController@editPost', 'files' => true])}}
				{{Form::label('title','タイトル')}}
				{{Form::text('title', $todo->title, ['class' => 'form-control'])}}
				<div  style="margin-top: 15px;">
					{{Form::label('content','詳細')}}
					{{Form::textarea('content', $todo->content, ['class' => 'form-control'])}}
				</div>
				<div  style="margin-top: 15px;">
					{{Form::radio('status', 0, (old('status')== 0 ? true: ($todo->status == 0))? true:false, ['class' => 'circle'])}}
					<span class="radio-button__icon">未完了</span>
					<span style="margin-left:20px;"></span>
					{{Form::radio('status', 1, (old('status')== 1 ? true: ($todo->status == 1))? true:false, ['class' => 'circle'])}}
					<span class="radio-button__icon">完了</span>
				</div>

				{{Form::text('place', "edit/{$todo->id}", ['style' => 'display: none;'])}}
				{{Form::text('id', "{$todo->id}", ['style' => 'display: none;'])}}

				<div style="margin-top: 20px;">
					<div class="row">
						<div class="col-md-2">
							{{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}
						{{Form::close()}}
						</div>
						<div class="col-md-1">
						{!! Form::model($todo, ['action' => ['TodoController@destory', $todo->id]]) !!}
							{!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
