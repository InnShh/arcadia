<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <h1>Change exhibit state</h1>
            <form action="{{ route('exhibits.state.update', $exhibit) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="current-exhibit-state">
                    <p><b>Current {{$exhibit->name}} exhibit state:</b></p>
                    <p>{{$exhibit->state}}<br /><x-date-badge :datetime="$exhibit->state_at" /></p>
                </div>
                <div class="new-exhibit-state">
                    <p><b>New {{$exhibit->name}} exhibit state:</b></p>
                    <x-datetime-field name="state_at" label="State updated at:" :value="$exhibit->state_at" />
                    <x-text-field name="state" :value="$exhibit->state" />
                    <x-submit-button text="Update" />
                </div>
            </form>
        </div>
    </div>
</x-app-layout>