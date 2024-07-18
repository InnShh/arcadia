<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Veterinary Report</h1>
            <form action="{{ route('veterinary-reports.update', $veterinaryReport) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="animal_id">Animal</label>
                    <select name="animal_id" id="animal_id" class="form-control" required>
                        @foreach ($animals as $animal)
                        <option value="{{ $animal->id }}" {{ $animal->id == $veterinaryReport->animal_id ? 'selected' : '' }}>{{ $animal->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Veterinarian</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($veterinarians as $veterinarian)
                        <option value="{{ $veterinarian->id }}" {{ $veterinarian->id == $veterinaryReport->user_id ? 'selected' : '' }}>{{ $veterinarian->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="visit_date">Visit Date</label>
                    <input type="date" name="visit_date" id="visit_date" class="form-control" value="{{ $veterinaryReport->visit_date }}">
                </div>
                <x-text-field name="details" :value="$veterinaryReport->details" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>