@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @component('admin.components/form/single')
            @slot('submitText', isset($question) ? __('Сохранить') : __('Опубликовать') )
            @slot('action', isset($question) ?
                route('admin.questions.update', ['question_id' => $question->id]) :
                route('admin.questions.store')
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
            @endslot
        @endcomponent
    </div>
@endsection
