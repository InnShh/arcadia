<header class="container-fluid sticky-top">
            <div>
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <figure>
                        <a href="{{ url('/') }}">
                            <img src="/images/arcadia_logo.svg" alt="Arcadia logo">
                        </a>
                    </figure>
                    <figcaption>Logo of the Arcadia Zoo</figcaption>
                    <div>
                        <ul class="main-menu">
                            <li>
                                <a href="{{ url('/') }}#all-exhibits">EXHIBITS</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}#animals-all">ANIMALS</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}#activities-all">ACTIVITIES</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}#reviews-all">REVIEWS</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}#donate-all">DONATE</a>
                            </li>
                            <li>
                                <a href="{{ url('/') }}#contact-all">contact</a>
                            </li>
                        {{--    <li>
                                @if (Route::has('login'))
                                    @auth
                                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                    @else
                                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Log in
                                    </a>
                                    @endauth
                                @endif
                            </li> --}}
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </header>