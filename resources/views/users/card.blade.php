<div><h3>{{Auth::user()->name}}</h3></div>
<div><img src="{{Gravatar::get(Auth::user()->email)}}"></div>
@include('user_follow.follow_button')