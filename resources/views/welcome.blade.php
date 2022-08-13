@extends('layouts.app')

@section('content')
    <h1>駆け出しエンジニア</h1>
    {!! link_to_route('signup.get','新規登録',[],)!!}
    <li>{!! link_to_route('login','ログイン',[]) !!}</li>
@endsection