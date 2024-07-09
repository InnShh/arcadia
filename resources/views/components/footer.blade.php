<footer class="container-fluid general-wrapper m-0">
@foreach($timetables as $timetable)
    <p>{{ $timetable->day_of_week_human }}: 
        @if($timetable->opening_time && $timetable->closing_time)
            {{ $timetable->opening_time }} - {{ $timetable->closing_time }}
        @else
            Closed
        @endif
    </p>
@endforeach
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
                {{--    <li>
                    <a href="">Log In</a>
                </li> --}}
                <li>
                    <a href="">Terms & Conditions</a>
                </li>
            </ul>
            <span>&#169; Copyright 2024. All rights reserved.</span>
        </footer>