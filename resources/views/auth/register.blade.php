@extends('layouts.app')

@section('content')
    <h1>登録</h1>
    
    {!! Form::open(['route','signup.post']) !!}
    
        {!!Form::label('name','Name')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
        
        {!!Form::label('email','Email')!!}
        {!!Form::email('email',null,['class'=>'form-control'])
        
        {!!Form::label('password','Password')!!}
        {!!Form::password('password',null,['class'=>'form-control'])!!}
        
        {!! Form::label('password_confirmation', 'Confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        
        {!!Form::submit('Sign up', ['class' => 'btn btn-primary btn-block'])!!}
    
    {!! Form::close() !!}
    
@endsection('content')