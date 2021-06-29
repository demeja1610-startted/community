@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - вопросы') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            {{-- <div class="card w-100 my-2">
                <div class="card-body p-0">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('ID') }}</th>
                                <th class="text-center">{{ __('Название') }}</th>
                                <th class="text-center">{{ __('Автор') }}</th>
                                <th class="text-center">{{ __('Дата создания') }}</th>
                                <th class="text-center">{{ __('Опубликовано') }}</th>
                                <th class="text-center">{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($questions as $question)
                                <tr>
                                    <td class="text-center">{{ $question->id }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('page.admin.questions.edit', ['question_id' => $question->id]) }}" class="link text-clamp-2">
                                            {{ $question->title }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $question->user->name }}</td>
                                    <td class="text-center">{{ $question->created_at }}</td>
                                    <td class="text-center">{{ $question->is_published ? __('Да') : __('Нет') }}</td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('page.admin.questions.edit', ['question_id' => $question->id]) }}"
                                            class="btn btn-outline-primary btn-sm"
                                            title="{{ __('Редактировать') }}"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            class="btn btn-outline-primary btn-sm "
                                            data-toggle="modal"
                                            data-target="#deleteConfirmModal"
                                            title="{{ __('Удалить') }}"
                                            data-href="{{ route('admin.questions.delete', ['question_id' => $question->id]) }}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($questions->hasPages())
                    <div class="card-footer px-3 pt-3 pb-0">
                        <div class="card-tools d-flex align-center justify-content-end">
                            {!! $questions->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                @endif
            </div> --}}
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
                                    @slot('cellContent')
                                        @include('admin.components/loop-table/edit-button', [
                                            'url' => route('page.admin.questions.edit', ['question_id' => $question->id]),
                                            'title' => __('Редактировать'),
                                        ])
                                        @include('admin.components/loop-table/delete-button', [
                                            'url' => route('admin.questions.delete', ['question_id' => $question->id]),
                                            'title' => __('Удалить'),
                                        ])
                                    @endslot
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
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление вопроса'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить этот вопрос?') !!}</p>
        @endslot
    @endcomponent
@endsection
