<div class="save-widget-wrapper {{ $wrapperClasses ?? '' }}">
    <div class="card card-secondary w-100 save-widget">
        <div class="card-header save-widget__header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>

        <div class="card-body save-widget__body">
            <div class="save-widget__buttons">
                <input
                    class="btn btn-outline-primary save-widget__button"
                    type="submit" name="save"
                    value="{{ __('Сохранить') }}"
                >

                @if ((isset($model) && !$model->is_published) || !isset($model))
                    <button class="btn btn-primary save-widget__button" type="submit">
                        {{ __('Опубликовать') }}
                    </button>
                @elseif(isset($model) && $model->is_published)
                <input
                    class="btn btn-outline-danger save-widget__button"
                    type="submit" name="stash"
                    value="{{ __('В черновик') }}"
                >
                @endif
            </div>
        </div>
    </div>
</div>
