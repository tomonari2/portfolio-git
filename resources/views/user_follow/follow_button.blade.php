@if(Auth::id()!=$user->id)
    @if(Auth::user()->is_following($user->id))
        {!!Form::open(['route'=>['user.unfollow',$user->id],'method'=>'delete'])!!}
            {!!Form::submit('フォロー削除する')!!}
        {!!Form::close()!!}
    @else
        {!!Form::open(['route'=>['user.follow',$user->id]])!!}
            {!!Form::submit('フォローする')!!}
        {!!Form::close()!!}
    @endif
@endif