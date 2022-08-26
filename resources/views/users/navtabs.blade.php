<ul>
    
    <li>
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            フォロー
            {{ $user->followings_count }}
        </a>
    </li>
    <li>
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            フォロワー
            {{ $user->followers_count }}
        </a>
    </li>
</ul>
