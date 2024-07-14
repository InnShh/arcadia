<nav class="dash-right-side">
    <div class="dash-nav-content">
        <div>
            <a href="{{ url('/') }}">
                <img src="/images/arcadia_logo.svg" alt="Arcadia logo">
            </a>
        </div>
        <x-dashboard-nav-links :links="$links" />
    </div>
</nav>