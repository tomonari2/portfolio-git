@extends('layouts.app')

@section('content')

<h3>{{$user->name}}</h3>

<img src="{{Gravatar::get($user->email)}}">






@endsection