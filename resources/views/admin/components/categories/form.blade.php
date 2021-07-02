@component('admin.components/form/single')
    @slot('submitText', isset($category) ? __('Сохранить') : __('Опубликовать') )
    @slot('action', isset($category) ?
        route(AdminRouterNames()::categories_update, ['category_id' => $category->id]) :
        route(AdminRouterNames()::сategories_store)
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
        @include('admin.components/input/select', [
            'label' => 'Родительская категория (необязательно)',
            'name' => 'category_id',
            'options' => $allCategories,
            'placeholder' => 'Выберите родительскую категорию',
        ])
    @endslot
    @isset($formWrapperClasses)
        @slot('formWrapperClasses', $formWrapperClasses )
    @endisset
    @isset($formClasses)
        @slot('formClasses', $formClasses )
    @endisset
@endcomponent
