@extends('layouts.app')

@section('content')

@include('users.card')
@include('users.navtabs')

@if(Auth::id()==$user->id)

    @include('tweets.form')

@endif

    @include('tweets.tweets')

@endsection