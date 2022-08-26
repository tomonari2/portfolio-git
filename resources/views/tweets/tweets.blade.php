@if(count($tweets)>0)
    @foreach($tweets as $tweet)
        <img src="{{Gravatar::get($tweet->user->email)}}">
        {!!link_to_route('users.show',$tweet->user->name,['user'=>$tweet->user->id])!!}
        <p>投稿日時{{$tweet->created_at}}</p>
        <p>{!! nl2br(e($tweet->content)) !!}</p>
        <img src="{{asset('img/nicebutton.png')}}" width="30px" class="d-inline float-left">
        @if (Auth::user()->is_favoriting($tweet->id))
        {{-- お気に入り解除 --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $tweet->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね',['class'=>'btn btn-success btn-sm']) !!}
            {{$tweet->favorite_users()->count()}}
        {!! Form::close() !!}
        @else
        {{-- お気に入り--}}
        {!! Form::open(['route' => ['favorites.favorite', $tweet->id]]) !!}
            {!! Form::submit('いいね',['class'=>'btn btn-secondary btn-sm']) !!}
            {{$tweet->favorite_users()->count()}}
        {!! Form::close() !!}
        @endif
        
        @if(Auth::id()==$tweet->user_id)
        {!!Form::open(['route'=>['tweets.destroy',$tweet->id],'method'=>'delete'])!!}
            {!!Form::submit('削除')!!}
        {!!Form::close()!!}
        @endif
    @endforeach    
@endif