<div class="dash-nav-links">
    <ul>
        @foreach ($links as $link)
        <li>
            <a href="{{ url($link['url']) }}" class="dash-nav-link-item">
                {{ $link['name'] }}
            </a>
        </li>
        @endforeach
    </ul>
</div>