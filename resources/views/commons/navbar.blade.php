<header>
    <nav class="navbar  bg-info">
    <a href="/"><h1 class="text-white">掲示板</h1></a>
    
    <ul class=" pull-right list-unstyled">
        @if(!Auth::check())
        <li>{!! link_to_route('signup.get','新規登録',[],[])!!}</li>
        <li>{!! link_to_route('login','ログイン',[]) !!}</li>
        @else
        <li>{!! link_to_route('users.index', 'ユーザー一覧', []) !!}</li>
        <li>{!! link_to_route('logout.get','ログアウト',[]) !!}</li>
        @endif
    </ul>
    </nav>
</header>

