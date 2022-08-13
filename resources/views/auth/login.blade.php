@extends('layouts.app')

@section('content')
<h1>ログイン</h1>

<div>
    {!!Form::open(['route'=>'login.post'])!!}
    
    <div>
        {!!Form::label('email','メールアドレスl')!!}
        {!!Form::text('email',null,['class'=>'form-control'])!!}
    </div>
    
    <div>
        {!!Form::label('password','パスワード')!!}
        
        {!!Form::password('password',['class'=>'form-control'])!!}
    </div>
    
    {!!Form::submit('ログイン')!!}
    {!!Form::close()!!}
    
    {!! link_to_route('signup.get', '新規登録')!!}
    
</div>
@endsection('content')