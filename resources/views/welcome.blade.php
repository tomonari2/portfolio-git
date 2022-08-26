@extends('layouts.app')

@section('content')
    
    @if(Auth::check())
        
        
        @include('users.card')
        @include('tweets.form')
        @include('tweets.tweets')
        
    @else
    <div class="text-center">
        <h1>ようこそ</h1>
        <div class="form-group list-unstyled">
            {!! link_to_route('signup.get','新規登録',[],['class'=>'form-control-lg'])!!}
            <li class='form-control-lg'>{!! link_to_route('login','ログイン',[],[]) !!}</li>
        </div>
    </div>    
    @endif
    
@endsection