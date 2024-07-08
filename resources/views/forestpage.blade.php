<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forest Exhibit</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-header />
        <main>
            
            <section class="container general-wrapper mt-0 p-0">
                <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/amur-tiger-1x.jpg" class="d-block w-100" alt="Forest living tiger">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/red-deer-1x.jpg" class="d-block w-100" alt="Forest living deer">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/wolf-x1.jpg" class="d-block w-100" alt="Forest living wolf">
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
                    <h1 class="text-title">Forest</h1>
                    <p class="general-text">
                    The Forest Exhibit at Arcadia Zoo invites you to explore 
                    the lush greenery and diverse wildlife where nature's wonders come alive. 
                    Immerse yourself in the serene ambiance, home to a variety of birds, 
                    mammals, and unique plant species. Discover the captivating beauty 
                    and biodiversity of the forest ecosystem, perfect for nature 
                    enthusiasts of all ages. Witness the harmonious coexistence of flora and fauna, 
                    a tranquil retreat that highlights the zoo's commitment to conservation.
                    </p> 
                </div>
            </section>

            <section class="container-fluid general-wrapper animals exhibit m-0">
                <x-card-wrapper>
                    <x-card href="" img="/images/amur-tiger-1x.jpg" title="Amur Tiger" text="Forest Exhibit" />
                    <x-card href="" img="/images/wolf-x1.jpg" title="Wolf" text="Forest Exhibit" />
                    <x-card href="" img="/images/red-deer-1x.jpg" title="Red Deer" text="Forest Exhibit" />
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
