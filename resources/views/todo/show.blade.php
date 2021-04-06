@extends('layouts.app')
@section('content')
<p>詳細</p>
<div class="incompletes" style="margin-top: 20px;">
    <div class="title">{{ $todo->title }}</div>
    <div class="content">{{ $todo->content }}</div>
    <div class="updated_at">{{ $todo->updated_at }}</div>
</div>
@endsection



