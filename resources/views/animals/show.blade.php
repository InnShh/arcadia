<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('favicon.ico.svg') }}" type="image/svg+xml">

    <title>{{ $animal->name }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-header />
    <main>

        <section class="container general-wrapper mt-0 p-0">
            <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($animal->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ $image->image_path }}" class="d-block w-100" alt="{{ $animal->name }}">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExhibitAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExhibitAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="container general-wrapper">
            <div class="row">
                <h1 class="text-title">{{ $animal->title }}</h1>
                <p class="general-text text-center">{{ $animal->title_description }}</p>
            </div>
        </section>

        <section class="container general-wrapper">

            <x-animal-info imgSrc="{{ $animal->avatar_image_path }}" imgAlt="{{ $animal->name }} face" name="{{ $animal->name }}" description="{{ $animal->description }}" race="{{ $animal->race }}" age="{{ $animal->age }}" diet="{{ $animal->diet }}" consumption="{{ $animal->consumption }}" />

        </section>

        @isset($animal->latestReport)
        <section class="container general-wrapper veto-com">
            <div class="row">
                <h3>Veterinarian comment</h3>
            </div>
            <div class="row">
                <x-veto-comment :imgSrc="$animal->latestReport->veto->avatar_image_path" :name="$animal->latestReport->veto->name" :role="$animal->latestReport->veto->role->name" :date="$animal->latestReport->visit_date" :comment="$animal->latestReport->details" />
            </div>
        </section>
        @endisset

        <x-donate-contact />

    </main>
    <x-footer />
</body>

</html>