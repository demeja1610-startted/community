@component('admin.components/form/single')
    @slot('submitText', isset($category) ? __('Сохранить') : __('Опубликовать') )
    @slot('action', isset($category) ?
        route('admin.categories.update', ['category_id' => $category->id]) :
        route('admin.categories.store')
    )
    @slot('method', isset($category) ? 'PATCH' : 'PUT' )
    @slot('title', isset($category) ? __('Редактирование категории') : __('Создание категории') )
    @slot('formContent')
        @include('admin.components/input/text', [
            'name' => 'title',
            'placeholder' => 'Путешествия',
            'label' => 'Название',
            'id' => 'title',
            'value' => isset($category) ? $category->title : old('title'),
            'error' => 'title',
        ])
        @include('admin.components/input/textarea', [
            'name' => 'description',
            'label' => 'Описание категории (необязательно)',
            'value' => isset($category) ? $category->description : old('description'),
            'error' => 'description',
        ])
    @endslot
@endcomponent
