<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Activity</h1>
            <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-string-field name="image" :value="$activity->image" />
                <x-string-field name="name" :value="$activity->name" />
                <x-text-field name="description" :value="$activity->description" />
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>