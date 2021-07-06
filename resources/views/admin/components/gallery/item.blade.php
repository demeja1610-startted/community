<a href="{{ $image->url ?? '' }}" class="gallery-item a-gallery__item {{ $classes ?? '' }}">
    <div class="a-gallery__item-remove-overlay">
        <div class="a-gallery__item-checkbox"></div>
    </div>
    <img
        src="{{ $image->url ?? '' }}"
        alt="{{ $image->alt ?? '' }}"
        data-id="{!! $image->id ?? '' !!}"
        class="a-gallery__image">
</a>
