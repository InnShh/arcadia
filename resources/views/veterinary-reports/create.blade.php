<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Create Veterinary Report</h1>
            <form action="{{ route('veterinary-reports.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select name="animal_id" id="animal_id" class="form-control" required>
                        @foreach ($animals as $animal)
                        <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Veterinarian</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($veterinarians as $veterinarian)
                        <option value="{{ $veterinarian->id }}">{{ $veterinarian->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="visit_date">Visit Date</label>
                    <input type="date" name="visit_date" id="visit_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>