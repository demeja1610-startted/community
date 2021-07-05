<div class="{{ $wrapperClasses ?? 'col-12' }} a-gallery">
    <div class="card card-secondary w-100 mb-0 {{ $cardClasses ?? '' }} gallery a-gallery__card">
        <div class="card-header a-gallery__header">
            <h3 class="card-title a-gallery__title">{!! __('Галлерея') !!}</h3>
        </div>

        <div class="card-body p-0 {{ $cartBodyClasses ?? '' }} a-gallery__body">
            @if (!$images->isEmpty())
                <div class="a-gallery__images">
                    @foreach ($images as $image)
                        @include('admin.components/gallery/item', $image)
                    @endforeach
                </div>
            @else
                <p class="text m-0 p-2 a-gallery__empty">{{ __('В галлерее нет изображений') }}</p>
            @endif
        </div>

        @if($images->hasPages())
            <div class="card-footer px-3 pb-0 {{ $footerClasses ?? '' }} a-gallery__footer">
                {!! $images->links('pagination::bootstrap-4') !!}
            </div>
        @endif
    </div>
</div>
