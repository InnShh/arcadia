@props(['rating'])

<div class="rating-container">
    <ul class="star-list list-inline">
        @for ($i = 1; $i <= 5; $i++) <li class="list-inline-item">
            <i class="{{ $rating >= $i ? 'star-fill' : ($rating >= $i - 0.5 ? 'star-half' : 'star-outline') }}"></i>
            </li>
            @endfor
    </ul>
</div>