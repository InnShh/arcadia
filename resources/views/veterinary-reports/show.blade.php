<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Veterinary Report Details</h1>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Report #{{ $veterinaryReport->id }}
                </div>
                <div class="card-body">
                    <p><strong>Animal:</strong> {{ $veterinaryReport->animal->name }}</p>
                    <p><strong>Veterinarian:</strong> {{ $veterinaryReport->veto->name }}</p>
                    <p><strong>Visit Date:</strong> {{ $veterinaryReport->visit_date }}</p>
                    <p><strong>Details:</strong> {{ $veterinaryReport->details }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('veterinary-reports.edit', $veterinaryReport->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('veterinary-reports.destroy', $veterinaryReport->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>