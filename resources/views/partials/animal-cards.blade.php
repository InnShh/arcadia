@foreach($animals->chunk(4) as $animalChunk)
<x-card-wrapper>
    @foreach($animalChunk as $animal)
    <x-card href="{{ route('animals.show', ['exhibit' => $animal->exhibit->slug , 'animal' => $animal->slug]) }}" img="{{ $animal->images->first()->image_path }}" title="{{ $animal->name }}" text="{{ $animal->exhibit->name }}" />
    @endforeach
</x-card-wrapper>
@endforeach