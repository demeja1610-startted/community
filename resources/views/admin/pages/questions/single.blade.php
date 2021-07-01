@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @component('admin.components/form/single')
            @slot('formClasses', 'mt-2')
            @slot('submitText', isset($question) ? __('Сохранить') : __('Опубликовать') )
            @slot('action', isset($question) ?
                route(AdminRouterNames()::page_questions_update, ['question_id' => $question->id]) :
                route(AdminRouterNames()::page_questions_store)
            )
            @slot('method', isset($question) ? 'PATCH' : 'PUT' )
            @slot('title', isset($question) ? __('Редактирование вопроса') : __('Создание вопроса') )
            @slot('formContent')
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
                @include('admin.components/input/toggler', [
                    'name' => 'is_published',
                    'label' => 'Опубликовать',
                    'id' => 'publish_toggler',
                    'labelClasses' => 'curp',
                    'checked' => isset($question) &&  $question->is_published ? true : false,
                ])
            @endslot
        @endcomponent
    </div>
@endsection
