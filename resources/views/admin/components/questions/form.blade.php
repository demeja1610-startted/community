<form
    autocomplete="off"
    method="POST"
    action="{{
        isset($question) ?
        route(AdminRouterNames()::page_questions_edit, ['question_id' => $question->id]) :
        route(AdminRouterNames()::page_questions_store) }}"
    class="col-12 {{ $formClasses ?? '' }}"
>
    @csrf

    @method(isset($question) ? 'PATCH' : 'PUT')

    <div class="row">
        <div class="col-12 col-xl-9">
            <div class="card card-secondary w-100">
                <div class="card-header">
                    <h3 class="card-title">{!! isset($question) ? __('Редактирование вопроса') : __('Создание вопроса') !!}</h3>
                </div>

                <div class="card-body">
                    @include('admin.components/input/text', [
                        'name' => 'title',
                        'placeholder' => 'Новый заголовок',
                        'label' => 'Заголовок',
                        'id' => 'title',
                        'value' => isset($question) ? $question->title : old('title'),
                        'error' => 'title',
                    ])
                    @include('admin.components/input/textarea', [
                        'name' => 'description',
                        'label' => 'Контент вопроса',
                        'classes' => 'editor',
                        'id' => 'editor',
                        'value' => isset($question) ? $question->description : old('description'),
                        'error' => 'description',
                    ])
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-3">
            <div class="d-flex flex-column w-100">
                @component('admin.components/form-wigets/save')
                    @slot('title', __('Действия'))

                    @isset($question)
                        @slot('model', $question)
                    @endisset
                @endcomponent

                @component('admin.components/form-wigets/categories')
                    @slot('title', __('Категории'))

                    @isset($question)
                        @slot('model', $question)
                    @endisset

                    @slot('categories', $categories)
                @endcomponent

                @component('admin.components/form-wigets/tags')
                    @slot('title', __('Теги'))

                    @isset($question)
                        @slot('model', $question)
                    @endisset

                    @slot('tags', $tags)
                @endcomponent
            </div>
        </div>
    </div>
</form>
