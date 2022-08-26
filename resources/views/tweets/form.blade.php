{!!Form::open(['route'=>'tweets.store'])!!}

    {!!Form::textarea('content',null)!!}
    
    {!!Form::submit('投稿')!!}

{!!Form::close()!!}