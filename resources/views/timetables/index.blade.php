<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Opening Hours</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('timetables.update') }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Day of Week</th>
                            <th>Opening Time</th>
                            <th>Closing Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timetables as $timetable)
                        <tr>
                            <td>{{ $timetable->day_of_week_human }}</td>
                            <td>
                                <input type="hidden" name="timetables[{{ $timetable->id }}][id]" value="{{ $timetable->id }}">
                                <input type="time" name="timetables[{{ $timetable->id }}][opening_time]" value="{{ $timetable->opening_time }}" class="form-control">
                            </td>
                            <td>
                                <input type="time" name="timetables[{{ $timetable->id }}][closing_time]" value="{{ $timetable->closing_time }}" class="form-control">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-submit-button text="Update" />
            </form>
        </div>
    </div>
</x-app-layout>