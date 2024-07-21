<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Animals</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Exhibit</th>
                        <th>Avatar</th>
                        <th>Last fed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animals as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->exhibit->name }}</td>
                        <td><img src="{{ $animal->avatar_image_path }}" alt="{{ $animal->name }}" style="width: 50px; height: 50px;"></td>
                        <td>
                            @isset($animal->latestFeed)
                            {{$animal->latestFeed->food}} ({{$animal->latestFeed->food_vol}} g)
                            <x-date-badge :datetime="$animal->latestFeed->created_at" />
                            @endisset
                        </td>
                        <td>
                            <a href="{{ route('feeding-reports.index',['for'=>$animal->id]) }}" class="btn btn-info">Feeds</a>
                            <a href="{{ route('veterinary-reports.create', ['for'=>$animal->id]) }}" class="btn btn-warning">Report</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>