@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - комментарии') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            {{-- <div class="card w-100 my-2">
                <div class="card-body p-0">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">{{ __('ID') }}</th>
                                <th class="text-center">{{ __('Комментарий') }}</th>
                                <th class="text-center w-10">{{ __('Автор') }}</th>
                                <th class="text-center w-10">{{ __('Дата создания') }}</th>
                                <th class="text-center w-10">{{ __('Опубликовано') }}</th>
                                <th class="text-center w-10">{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr>
                                    <td class="text-center">{{ $comment->id }}</td>
                                    <td class="text-center min-w-px-200">
                                        <a href="{{ route('page.admin.comments.edit', ['comment_id' => $comment->id]) }}" class="link text-clamp-2">
                                            {{ strip_tags($comment->body) }}
                                        </a>
                                    </td>
                                    <td class="text-center text-nowrap">{{ $comment->user->name }}</td>
                                    <td class="text-center text-nowrap">{{ $comment->created_at }}</td>
                                    <td class="text-center">{{ $comment->is_published ? __('Да') : __('Нет') }}</td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('page.admin.comments.edit', ['comment_id' => $comment->id]) }}"
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
                                            data-href="{{ route('admin.comments.delete', ['comment_id' => $comment->id]) }}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <p class="text">{{ __('Статей не найдено') }}</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($comments->hasPages())
                    <div class="card-footer px-3 pt-3 pb-0">
                        <div class="card-tools d-flex align-center justify-content-end">
                            {!! $comments->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                @endif
            </div> --}}
            @component('admin.components/loop-table/wrap')
                @if (!$comments->isEmpty())
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
                    @forelse ($comments as $comment)
                        @component('admin.components/loop-table/table-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->id, 'cellClasses' => 'w-px-10'])
                                @component('admin.components/loop-table/table-cell')
                                    @slot('cellContent')
                                        <a href="{{ route('page.admin.comments.edit', ['comment_id' => $comment->id]) }}" class="link text-clamp-2">
                                            {{ $comment->body }}
                                        </a>
                                    @endslot
                                @endcomponent
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->user->name, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->created_at, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->is_published ? __('Да') : __('Нет'), 'cellClasses' => 'w-10'])
                                @component('admin.components/loop-table/table-cell', ['cellClasses' => 'w-10'])
                                    @slot('cellContent')
                                        @include('admin.components/loop-table/edit-button', [
                                            'url' => route('page.admin.comments.edit', ['comment_id' => $comment->id]),
                                            'title' => __('Редактировать'),
                                        ])
                                        @include('admin.components/loop-table/delete-button', [
                                            'url' => route('admin.comments.delete', ['comment_id' => $comment->id]),
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

                @if($comments->hasPages())
                    @slot('footerClasses', 'd-flex align-center justify-content-end')
                    @slot('footerContent')
                        {!! $comments->links('pagination::bootstrap-4') !!}
                    @endslot
                @endif
            @endcomponent
        </div>
    </div>
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление комментария'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить этот комментарий?') !!}</p>
        @endslot
    @endcomponent
@endsection
