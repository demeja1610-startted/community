<a href="{{ $image->url ?? '' }}" class="gallery-item a-gallery__item {{ $classes ?? '' }}">
    <img
        src="{{ $image->url ?? '' }}"
        alt="{{ $image->alt ?? '' }}"
        class="a-gallery__image">
</a>
