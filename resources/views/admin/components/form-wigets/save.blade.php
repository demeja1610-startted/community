<div class="card card-secondary w-100 save-widget">
    <div class="card-header save-widget__header">
        <h3 class="card-title">{!! $title !!}</h3>
    </div>

    <div class="card-body save-widget__body">
        <div class="save-widget__buttons">

            @isset($model->is_published)
                <input
                    class="btn btn-outline-primary save-widget__button"
                    type="submit" name="save"
                    value="{!! __('Сохранить') !!}"
                >
            @endisset

            @if ((isset($model) && !$model->is_published) || !isset($model))
                <button class="btn btn-primary save-widget__button" type="submit">
                    {!! isset($publishButtonText) ? __($publishButtonText) : __('Опубликовать') !!}
                </button>
            @elseif(isset($model) && $model->is_published)
                <input
                    class="btn btn-outline-danger save-widget__button"
                    type="submit" name="stash"
                    value="{!! __('В черновик') !!}"
                >
            @endif

            {!! $widgetButtons ?? '' !!}
        </div>
    </div>
</div>
