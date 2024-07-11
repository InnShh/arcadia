<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('favicon.ico.svg') }}" type="image/svg+xml">

    <title>ARCADIA</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-header />
    <main>
        <section class="hero-bg">
            <div class="hero-content">
                <span class="hero-title">ARCADIA</span>
                <span>EXPLORING THE WILDLIFE</span>
            </div>
            <div class="lion">
                <img src="/images/lion_hero_trans.png" alt="Lion in the desert" />
            </div>
            <div class="scroll-down">
                <a href="#presentation">
                    <i class="bi bi-arrow-down"></i>
                </a>
            </div>
        </section>

        <section id="presentation" class="container general-wrapper">
            <div class="row">
                <h1 class="text-title">The zoo</h1>
                <p class="general-text">
                    Arcadia Zoo is a modern sanctuary devoted
                    to the well-being and natural lifestyles
                    of its wild animals. Emphasizing conservation,
                    Arcadia provides expansive, naturalistic
                    habitats that mimic the animals' native
                    environments. The dedicated staff employs
                    the latest in veterinary care and enrichment
                    activities to ensure both physical and mental
                    health. Visitors to Arcadia Zoo witness animals
                    thriving, a testament to the zoo's commitment
                    to ethical wildlife care and education.

                    The enclosures at the Arcadia Zoo are designed
                    to replicate the living conditions of the animals
                    in their natural environment.
                </p>
            </div>
        </section>

        <section class="container general-wrapper" id="all-exhibits" style="padding:0;">
            <div id="carouselExhibitAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ route('savanna') }}">
                            <img src="/images/desert-fox-1x.jpg" srcset="/images/desert-fox-1x.jpg 1x, /images/desert-fox-2x.jpg 2000w" class="d-block w-100" alt="Savanna living fox">
                            <div class="bg-gradient">
                                <div class="carousel-caption">
                                    <h5 class="second-level-title">Savanna</h5>
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
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('arctic') }}">
                            <img src="/images/polar-bear-1x.jpg" srcset="/images/polar-bear-1x.jpg, /images/polar-bear-2x.jpg 2000w" class="d-block w-100" alt="Savanna living fox">
                            <div class="bg-gradient">
                                <div class="carousel-caption">
                                    <h5 class="second-level-title">Arctic Exhibit</h5>
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
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('forest') }}">
                            <img src="/images/wolf-x1.jpg" class="d-block w-100" alt="Forest living wolf">
                            <div class="bg-gradient">
                                <div class="carousel-caption">
                                    <h5 class="second-level-title">Forest Exhibit</h5>
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
                            </div>
                        </a>
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

        <section class="container-fluid general-wrapper promo p-0 m-0">
            <div class="container row m-auto anim">
                <h2 class="text-end">Protecting wild life</h2>
                <p class="general-text text-end">
                    At Arcadia Zoo, we are dedicated to the
                    protection of wild animals through rigorous
                    conservation efforts and habitat preservation.
                    Join us in our commitment to
                    safeguarding wildlife for future generations.
                </p>
            </div>
        </section>

        <section class="container-fluid general-wrapper animals m-0" id="animals-all">
            <div class="container row m-auto">
                <h2 class="text-title">Animals</h2>
                <p class="general-text">
                    From tiny toads to big cats, there are more than
                    3 000 animals at the Arcadia Zoo. Plan a visit
                    to see your favorite member of the animal kingdom
                    and meet some new ones along the way! With interactive exhibits and daily shows, there's always something exciting happening at Arcadia Zoo.
                    Bring your family and friends for an unforgettable adventure filled with learning and fun.
                </p>
            </div>
            <x-card-wrapper>
                <x-card href="/exhibit/zebra" img="/images/amur-tiger-1x.jpg" title="Amur Tiger" text="Forest Exhibit" />
                <x-card href="{{ route('giraffemax') }}" img="/images/2giraffe-1x.jpg" title="Giraffe Max" text="Savanna Exhibit" />
                <x-card href="/exhibit/desert-fox" img="/images/polar-bear-1x.jpg" title="Polar bear" text="Arctic Exhibit" />
                <x-card href="/exhibit/lion" img="/images/female-lion-1x.jpg" title="Lion" text="Savanna Exhibit" />
            </x-card-wrapper>
            <x-card-wrapper>
                <x-card href="/exhibit/zebra" img="/images/amur-tiger-1x.jpg" title="Amur Tiger" text="Forest Exhibit" />
                <x-card href="{{ route('giraffemax') }}" img="/images/2giraffe-1x.jpg" title="Giraffe Max" text="Savanna Exhibit" />
                <x-card href="/exhibit/desert-fox" img="/images/polar-bear-1x.jpg" title="Polar bear" text="Arctic Exhibit" />
                <x-card href="/exhibit/lion" img="/images/female-lion-1x.jpg" title="Lion" text="Savanna Exhibit" />
            </x-card-wrapper>
            <div class="row">
                <button type="button" class="btn btn-outlined w-chbl">Load more</button>
            </div>
        </section>

        <section class="container-fluid general-wrapper reviews mt-0" id="reviews-all">
            <div class="container row m-auto">
                <div class="col-12 col-md-6">
                    <div class="row justify-content-center">

                        <div id="reviewCarousel" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach($reviews as $index => $review)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="text-center">
                                        <div class="rating-container">
                                            <ul class="star-list list-inline">
                                                <li class="list-inline-item"><i class=""></i></li>
                                                <li class="list-inline-item"><i class=""></i></li>
                                                <li class="list-inline-item"><i class=""></i></li>
                                                <li class="list-inline-item"><i class=""></i></li>
                                                <li class="list-inline-item"><i class=""></i></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <span class="rating">{{ $review->rating }}</span>
                                            <p class="general-text">{{ $review->comment }}</p>
                                            <span>{{ $review->pseudo }}</span><br />
                                            <span>{{ \Carbon\Carbon::parse($review->created_at)->format('m/d/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="review-buttons">
                                <button class="btn btn-secondary" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                                    <i class="bi bi-arrow-left"></i>
                                </button>
                                <button class="btn btn-secondary" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-6 testimonial">
                    <div class="row">
                        <h3>Share your testimonial</h3>
                    </div>
                    <div class="testimonial-form">
                        <form id="testimonialForm">
                            <div class="row">
                                <ul class="star-list">
                                    <li class="list-inline-item"><i class="bi bi-star" data-value="1"></i></li>
                                    <li class="list-inline-item"><i class="bi bi-star" data-value="2"></i></li>
                                    <li class="list-inline-item"><i class="bi bi-star" data-value="3"></i></li>
                                    <li class="list-inline-item"><i class="bi bi-star" data-value="4"></i></li>
                                    <li class="list-inline-item"><i class="bi bi-star" data-value="5"></i></li>
                                </ul>
                                <input type="hidden" name="rating" id="rating" value="0">
                            </div>
                            <input class="form-control w-chbl" type="text" name="name" placeholder="Your name" autocomplete required>
                            <div id="charCount">0/320</div>
                            <textarea class="form-control w-chbl" name="message" type="text" id="message" rows="6" placeholder="Your testimonial, 320 characters max" maxlength="320" required></textarea>
                            <button type="submit" class="btn btn-outlined w-chbl">S U B M I T</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="container general-wrapper activities" id="activities-all">
            <div class="row">
                <h1 class="text-title">{{ $activities->first()->name }}</h1>
                <p class="general-text">
                    {{ $activities->first()->description }}
                </p>
            </div>
            @foreach($activities->skip(1) as $activity)
            <div class="row activity">
                <figure class="col-12 col-lg-6 img-container">
                    <img src="{{ $activity->image }}" alt="{{ $activity->name }}" />
                </figure>
                <div class="col-12 col-lg-6">
                    <h3>{{ $activity->name }}</h3>
                    <p class="general-text">
                        {{ $activity->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </section>

        <x-donate-contact />
    </main>
    <x-footer />

    <script>
        const reviewsStoreUrl = '{{ route("reviews.store") }}';
    </script>

</body>

</html>