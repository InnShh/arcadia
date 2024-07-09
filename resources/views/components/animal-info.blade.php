<div class="row animal-one">
    <div class="col-12 col-md-6">
        <figure class="avatar">
            <img src="{{ $imgSrc }}" alt="{{ $imgAlt }}" />
        </figure>
    </div>
    <div class="col-12 col-md-6">
        <div>
            <h2>{{ $name }}</h2>
            <p class="general-text">
                {{ $description }}
            </p>
        </div>
        <div>
            <p class="general-text">Race: <span class="race">{{ $race }}</span></p>
            <p class="general-text">Age: <span class="age">{{ $age }}</span></p>
            <p class="general-text">Diet: <span class="diet">{{ $diet }}</span></p>
            <p class="general-text">Consumption: <span class="consumption">{{ $consumption }}</span></p>
        </div>
    </div>
</div>
