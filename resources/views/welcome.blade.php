@extends('layouts.app')

@section('content')
    <h1>駆け出しエンジニア</h1>
    {!! link_to_route('signup.get','Sign up now',[],['class'=>'btn btn-lg btn-primary'])!!}
@endsection