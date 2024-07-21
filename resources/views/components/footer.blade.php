<footer class="container-fluid general-wrapper m-0">
    <ul>
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li>
            <a href="{{ url('/') }}#all-exhibits">Exhibits</a>
        </li>
        <li>
            <a href="{{ url('/') }}#animals-all">Animals</a>
        </li>
        <li>
            <a href="{{ url('/') }}#activities-all">Activities</a>
        </li>
        <li>
            <a href="{{ url('/') }}#reviews-all">Reviews</a>
        </li>

        <li>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Login
            </a>
            @else
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Login
            </a>
            @endauth
            @endif
        </li>

        <li>
            <a href="">Terms & Conditions</a>
        </li>
    </ul>

    <p>Opening hours:</p>
    @foreach($timetables as $timetable)
    <p>{{ $timetable->day_of_week_human }}:
        @if($timetable->opening_time && $timetable->closing_time)
        {{ $timetable->opening_time }} - {{ $timetable->closing_time }}
        @else
        Closed
        @endif
    </p>
    @endforeach

    <span>&#169; Copyright 2024. All rights reserved.</span>
</footer>