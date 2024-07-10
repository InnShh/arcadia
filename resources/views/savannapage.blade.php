<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('favicon.ico.svg') }}" type="image/svg+xml">

        <title>Savanna Exhibit</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-header />
        <main>
            
            <section class="container general-wrapper mt-0 p-0">
                <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/desert-fox-1x.jpg" class="d-block w-100" alt="Savanna living fox">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/wo-giraffes-x1.jpg" class="d-block w-100" alt="Savanna living giraffes">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/zebras-x1.jpg" class="d-block w-100" alt="Savanna living zebras">
                        </div>
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
                    <h1 class="text-title">Savanna</h1>
                    <p class="general-text">
                    The Savanna habitat at Arcadia Zoo spans a 
                    vast area, meticulously designed to mimic 
                    the open grasslands of Africa. Giraffes, zebras, 
                    and antelopes roam freely, creating a dynamic 
                    and authentic savanna experience for 
                    both the animals and visitors. The habitat 
                    features native plants and waterholes, ensuring 
                    a realistic and enriching environment. Visitors 
                    can observe the natural behaviors and 
                    interactions of these majestic species from 
                    specially designed viewing platforms. 
                    This immersive habitat underscores 
                    Arcadia Zoo’s commitment to conservation 
                    and the 
                    preservation of wildlife in their 
                    natural settings.
                    </p>
                </div>
            </section>

            <section class="container-fluid general-wrapper animals exhibit m-0">
                <x-card-wrapper>
                    <x-card href="" img="/images/zebras-x1.jpg" title="Zebra" text="Savanna Exhibit" />
                    <x-card href="{{ route('giraffemax') }}" img="/images/2giraffe-1x.jpg" title="Giraffe Max" text="Savanna Exhibit" />
                    <x-card href="" img="/images/desert-fox-1x.jpg" title="Desert Fox" text="Savanna Exhibit" />
                    <x-card href="" img="/images/female-lion-1x.jpg" title="Lion" text="Savanna Exhibit" />
                </x-card-wrapper>
            </section>

            <x-donate-contact />

        </main>
        <x-footer />
    </body>
</html>
