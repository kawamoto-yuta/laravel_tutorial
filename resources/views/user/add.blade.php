<div>
    <h3>ユーザー登録</h3>
    {{Form::open(['action' => 'UserController@userAddPost', 'files' => true])}}

    {{Form::label('name','名前')}}
    {{Form::text('name', null, ['class' => 'form-control'])}}
    <br>
    {{Form::label('email','メール')}}
    {{Form::text('email', null, ['class' => 'form-control'])}}
    <br>
    {{Form::label('password','パスワード')}}
    {{Form::text('password', null, ['class' => 'form-control'])}}
    <br>
    {{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

    {{Form::close()}}
</div>