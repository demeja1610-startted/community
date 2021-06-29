@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - вопросы') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            @component('admin.components/loop-table/wrap')
                @if (!$questions->isEmpty())
                    @slot('headerContent')
                        @component('admin.components/loop-table/header-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('ID')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Название')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Автор')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Дата создания')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Опубликовано')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Действия')])
                            @endslot
                        @endcomponent
                    @endslot
                @endif

                @slot('tableContent')
                    @forelse ($questions as $question)
                        @component('admin.components/loop-table/table-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $question->id, 'cellClasses' => 'w-px-10'])
                                @component('admin.components/loop-table/table-cell')
                                    @slot('cellContent')
                                        <a href="{{ route('page.admin.questions.edit', ['question_id' => $question->id]) }}" class="link text-clamp-2">
                                            {{ $question->title }}
                                        </a>
                                    @endslot
                                @endcomponent
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $question->user->name, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $question->created_at, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $question->is_published ? __('Да') : __('Нет'), 'cellClasses' => 'w-10'])
                                @component('admin.components/loop-table/table-cell', ['cellClasses' => 'w-10'])
                                    <div class="d-flex align--items-center no-wrap w-100 justify-content-center">
                                        @slot('cellContent')
                                            @include('admin.components/loop-table/edit-button', [
                                                'url' => route('page.admin.questions.edit', ['question_id' => $question->id]),
                                                'title' => __('Редактировать'),
                                                'buttonClasses' => 'mr-2',
                                            ])
                                            @include('admin.components/confirm/button', [
                                                'url' => route('admin.questions.delete', ['question_id' => $question->id]),
                                                'title' => __('Удалить вопрос'),
                                                'icon' => '<i class="fas fa-trash-alt"></i>',
                                                'confirmText' => 'Вы действительно хотите удалить этот вопрос?',
                                                'method' => 'delete',
                                            ])
                                        @endslot
                                    </div>
                                @endcomponent
                            @endslot
                        @endcomponent
                    @empty
                        @component('admin.components/loop-table/table-row')
                            @slot('rowContent')
                                @component('admin.components/loop-table/table-cell')
                                    @slot('cellContent')
                                        {!! __('Статей не найдено') !!}
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    @endforelse
                @endslot

                @if($questions->hasPages())
                    @slot('footerClasses', 'd-flex align-center justify-content-end')
                    @slot('footerContent')
                        {!! $questions->links('pagination::bootstrap-4') !!}
                    @endslot
                @endif
            @endcomponent
        </div>
    </div>
    @include('admin.components/confirm/modal')
@endsection
