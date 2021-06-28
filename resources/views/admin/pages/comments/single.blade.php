@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @component('admin.components/form/single')
            @slot('formClasses', 'mt-2')
            @slot('submitText', isset($comment) ? __('Сохранить') : __('Опубликовать') )
            @slot('action', isset($comment) ?
                route('admin.comments.update', ['comment_id' => $comment->id]) :
                route('admin.comments.store')
            )
            @slot('method', isset($comment) ? 'PATCH' : 'PUT' )
            @slot('title', isset($comment) ? __('Редактирование комментария') : __('Создание комментария') )
            @slot('formContent')
                @include('admin.components/input/textarea', [
                    'name' => 'comment_body',
                    'label' => 'Контент комментария',
                    'classes' => 'editor',
                    'id' => 'editor',
                    'value' => isset($comment) ? $comment->body : old('comment_body'),
                    'error' => 'comment_body',
                ])
            @endslot
        @endcomponent
    </div>
@endsection
