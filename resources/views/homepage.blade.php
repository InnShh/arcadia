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
                    @foreach($exhibits as $exhibit)
                    <div class="carousel-item  @if ($loop->first) active @endif">
                        <a href="{{ route('exhibits.show', ['exhibit' => $exhibit->slug]) }}">
                            @if($exhibit->images->isNotEmpty())
                            <img src="{{ $exhibit->images->first()->image_path }}" class="d-block w-100" alt="{{ $exhibit->title }}">
                            @endif
                            <div class="bg-gradient">
                                <div class="carousel-caption">
                                    <h5 class="second-level-title">{{ $exhibit->name }}</h5>
                                    <p class="general-text">
                                        {{ $exhibit->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
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