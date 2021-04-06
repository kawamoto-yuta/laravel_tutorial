@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">詳細</div>
			<div class="card-body">
                <div class="title">
                    <p style="margin:0;"><<b>タイトル</b>></p>
                    <p>{{ $todo->title }}</p>
                </div>
                <div class="content">
                    <p style="margin:0;"><<b>内容</b>></p>
                    <p>{{ $todo->content }}</p>
                </div>
                <div class="updated_at">
                    <p style="margin:30px 0 0 0;">{{ $todo->updated_at }}</p>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection



