<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('favicon.ico.svg') }}" type="image/svg+xml">

        <title>Arctic Exhibit</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-header />
        <main>
            
            <section class="container general-wrapper mt-0 p-0">
                <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/polar-bear-1x.jpg" class="d-block w-100" alt="Arctic living white bear">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/penguin-x1.jpg" class="d-block w-100" alt="Arctic living penguins">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/seals-x1.jpg" class="d-block w-100" alt="Arctic living seal">
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
                    <h1 class="text-title">Arctic</h1>
                    <p class="general-text">
                    At our zoo's Arctic exhibit, 
                    immerse yourself in a world of snow and ice, 
                    home to fascinating creatures like polar bears, 
                    seals, and Arctic foxes. Witness these animals' 
                    incredible adaptations to their harsh environment, 
                    from thick fur to agile hunting skills. Learn about 
                    the delicate balance of the Arctic ecosystem and 
                    the conservation efforts dedicated to preserving 
                    these vital habitats. Engage in interactive 
                    displays that showcase the beauty and challenges 
                    of Arctic life, inspiring a deeper understanding 
                    and commitment to wildlife conservation.
                    </p>
                </div>
            </section>

            <section class="container-fluid general-wrapper animals exhibit m-0">
                <x-card-wrapper>
                    <x-card href="" img="/images/polar-bear-1x.jpg" title="Polar bear" text="Arctic Exhibit" />
                    <x-card href="" img="/images/arctic-fox-x1.jpg" title="Arctic Fox" text="Arctic Exhibit" />
                </x-card-wrapper>
                <div class="row">
                    <button type="button" class="btn btn-outlined w-chbl">Load more</button>
                </div>
            </section>

            <x-donate-contact />

        </main>
        <x-footer />
    </body>
</html>
