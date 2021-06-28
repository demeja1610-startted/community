@component('admin.components/form/single')
    @slot('submitText', isset($tag) ? __('Сохранить') : __('Опубликовать') )
    @slot('action', isset($tag) ?
        route('admin.tags.update', ['tag_id' => $tag->id]) :
        route('admin.tags.store')
    )
    @slot('method', isset($tag) ? 'PATCH' : 'PUT' )
    @slot('title', isset($tag) ? __('Редактирование тега') : __('Создание тега') )
    @slot('formContent')
        @include('admin.components/input/text', [
            'name' => 'title',
            'placeholder' => 'Путешествия',
            'label' => 'Название',
            'id' => 'title',
            'value' => isset($tag) ? $tag->title : old('title'),
            'error' => 'title',
        ])
        @include('admin.components/input/textarea', [
            'name' => 'description',
            'label' => 'Описание тега (необязательно)',
            'value' => isset($tag) ? $tag->description : old('description'),
            'error' => 'description',
        ])
    @endslot
@endcomponent
