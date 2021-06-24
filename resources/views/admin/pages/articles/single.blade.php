@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @component('admin.components/form/single')
            @slot('submitText', isset($article) ? __('Сохранить') : __('Опубликовать') )
            @slot('action', isset($article) ?
                route('admin.articles.update', ['article_id' => $article->id]) :
                route('admin.articles.store')
            )
            @slot('method', isset($article) ? 'PATCH' : 'PUT' )
            @slot('title', isset($article) ? __('Редактирование статьи') : __('Создание статьи') )
            @slot('formContent')
                @include('admin.components/input/text', [
                    'name' => 'title',
                    'placeholder' => 'Новый заголовок',
                    'label' => 'Заголовок',
                    'id' => 'title',
                    'value' => isset($article) ? $article->title : old('title'),
                    'error' => 'title',
                ])
                @include('admin.components/input/textarea', [
                    'name' => 'description',
                    'label' => 'Контент статьи',
                    'classes' => 'editor',
                    'id' => 'editor',
                    'value' => isset($article) ? $article->description : old('description'),
                    'error' => 'description',
                ])
            @endslot
        @endcomponent
    </div>
@endsection
