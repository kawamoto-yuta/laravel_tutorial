<div>
    <h3>ユーザー登録</h3>
    {{Form::open(['action' => 'UserController@userAddPost', 'files' => true])}}

    {{Form::label('u_id','ID')}}
    {{Form::text('u_id', null, ['class' => 'form-control', 'placeholder' => 'ID'])}}
    <br>
    {{Form::label('password','パスワード')}}
    {{Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'パスワード'])}}

    {{Form::submit('保存', ['class'=>'btn btn-primary btn-block'])}}

    {{Form::close()}}
</div>