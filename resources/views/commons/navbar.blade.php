<header>
    <a href="/">駆け出しエンジニアとつながろう</a>
    <ul>
        <li>{!! link_to_route('signup.get','新規登録',[],['class'=>'btn btn-lg btn-primary'])!!}</li>
        <li>{!! link_to_route('login','ログイン',[],[]) !!}</li>
        <li>{!! link_to_route('users.index', 'ユーザー一覧', [], []) !!}</li>
        
        <li>{!! link_to_route('logout.get','ログアウト') !!}</li>
    </ul>
</header>

