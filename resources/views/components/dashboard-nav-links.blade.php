<div class="dash-nav-links">
    <ul>
        @foreach ($links as $link)
        <li>
            <a href="{{ url($link['url']) }}" class="dash-nav-link-item">
                {{ $link['name'] }}
            </a>
        </li>
        @endforeach
        <li>
            <a class="dash-nav-link-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>