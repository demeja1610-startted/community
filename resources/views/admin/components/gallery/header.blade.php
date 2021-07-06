<div class="col-12 mb-2">
    <div class="a-gallery__header">
        @include('admin.components/input/file', [
            'labelText' => 'Выбрать',
            'inputText' => 'Добавить изображение',
            'id' => 'images',
            'name' => 'images[]',
            'multiple' => true,
            'inputClasses' => 'a-gallery-image-upload',
            'url' => route(apiAdminRouterNames()::gallery_store),
            'csrf' => csrf_token(),
        ])
        <button class="btn btn-danger col-1 a-gallery__mass-remove" data-text="{!! __('Массовое удаление') !!}" data-cancel-text="{{ __('Отмена') }}">
            {{ __('Массовое удаление') }}
        </button>
        <form class="a-gallery__header-remove-form" action="">
            @csrf
            <button class="btn btn-danger text-nowrap" type="submit" disabled>{!! __('Удалить навсегда') !!}</button>
        </form>
    </div>
</div>
