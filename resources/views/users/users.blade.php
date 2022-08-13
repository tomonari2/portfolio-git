@if(count($users)>0)

    @foreach($users as $user)
    
        <img src="{{Gravatar::get($user->email)}}">
        
        {{ $user->name }}
        
        <p>{!! link_to_route('users.show','ユーザー詳細',['user'=>$user->id])!!}   </p>
    
    @endforeach
    
    {{$users->links()}}

@endif