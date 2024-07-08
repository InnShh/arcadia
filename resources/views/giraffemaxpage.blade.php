<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Giraffe Max</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-header />
        <main>
            
        <section class="container general-wrapper mt-0 p-0">
                <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/2giraffe-1x.jpg" class="d-block w-100" alt="Savanna living giraffe">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/wo-giraffes-x1.jpg" class="d-block w-100" alt="Savanna living giraffes">
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
                    <h1 class="text-title">Giraffe Max - majestic giant</h1>
                    <p class="general-text text-center">
                        Giraffes are true marvels of the animal kingdom. They have hearts the size of basketballs. Special one-way valves and elastic 
                        blood vessels allow giraffes to bend over for a drink without having their enormous blood pressure negatively affect their brains. 
                        Giraffes are constantly on alert, and only sleep about 20 minutes per night.</br></br>
                        Arcadia Zoo is home to one magnificent giraffe, a male named Max, living in our spacious Savanna exhibit.
                    </p>
                </div>
            </section>

            <section class="container general-wrapper">
                <div class="row animal-one">
                    <div class="col-12 col-md-6">
                        <figure class="avatar">
                            <img src="/images/giraffe-max_400x400px.jpg" alt="Giraffe Max face" />
                        </figure>
                    </div>
                    <div class="col-12 col-md-6">
                        <div>
                            <h2>Max</h2>
                            <p class="general-text">
                                Max, the male giraffe, hails from the savannas of Kenya. At 8 years old, 
                                he enjoys a diet rich in acacia leaves, consuming around 75 pounds 
                                of foliage daily. Max is known for his gentle nature and impressive 
                                height, making him a favorite among visitors.
                            </p>
                        </div>
                        <div>
                            <p class="general-text>">Race: <span class="race">Nubian giraffe</span></p>
                            <p class="general-text>">Age: <span class="age">8 years</span></p>
                            <p class="general-text>">Diet: <span class="diet">Acacia leaves</span></p>
                            <p class="general-text>">Consumption: <span class="consumption">75 pounds</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container general-wrapper veto-com">
                <div class="row">
                    <h3>Veterinarian comments</h3>
                </div>
                <div class="row">
                    <div class="veto-comment">
                        <div>
                            <figure class="avatar">
                                <img src="/images/veto-female_400x400px.jpg" alt="Veterinarian avatar" />
                            </figure>
                            <div class="veto-info">
                                <span>Dr. Sarah Thompson</span>
                                <span>Veterinarian in charge of savanna animals.</span>
                                <span class="comment-date">15/05/2024</span>
                            </div>
                        </div>
                        <div>
                            <p class="general-text">
                                "Max is a gentle giant with a calm disposition. His health is excellent, 
                                and he thrives on his diet of fresh acacia leaves, which we ensure 
                                is always plentiful."
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <x-donate-contact />

        </main>
        <x-footer />
    </body>
</html>
