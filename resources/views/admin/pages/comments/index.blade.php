@extends('layouts.admin')

@section('content_header')
    <h1>{!! __('Консоль - комментарии') !!}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            @component('admin.components/loop-table/wrap')
                @if (!$comments->isEmpty())
                    @slot('headerContent')
                        @component('admin.components/loop-table/header-row')
                            @slot('rowContent')
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('ID')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Название')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Автор')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Дата создания')])
                                @include('admin.components/loop-table/header-cell', ['cellContent' => __('Одобрен')])
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
                                        <a href="{{ route(AdminRouterNames()::page_comments_edit, ['comment_id' => $comment->id]) }}" class="link text-clamp-2">
                                            {!! $comment->body !!}
                                        </a>
                                    @endslot
                                @endcomponent
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->user->name, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', ['cellContent' => $comment->created_at, 'cellClasses' => 'w-10'])
                                @include('admin.components/loop-table/table-cell', [
                                    'cellContent' => $comment->is_published ? __('Да') : __('Нет'),
                                    'cellClasses' => 'w-10 ' . ($comment->is_published ? 'text-success' : 'text-danger')
                                ])
                                @component('admin.components/loop-table/table-cell', ['cellClasses' => 'w-10'])
                                    @slot('cellContent')
                                        <div class="d-flex align--items-center no-wrap w-100 justify-content-center">
                                            @include('admin.components/loop-table/edit-button', [
                                                'url' => route(AdminRouterNames()::page_comments_edit, ['comment_id' => $comment->id]),
                                                'title' => __('Редактировать'),
                                                'buttonClasses' => 'mr-2',
                                            ])
                                            @include('admin.components/confirm/button', [
                                                'url' => route(AdminRouterNames()::page_comments_destroy, ['comment_id' => $comment->id]),
                                                'title' => __('Удалить комментарий'),
                                                'icon' => '<i class="fas fa-trash-alt"></i>',
                                                'confirmText' => 'Вы действительно хотите удалить этот комментарий?',
                                                'method' => 'delete',
                                                'buttonClasses' => 'mr-2',
                                            ])
                                            @if ( !$comment->is_published)
                                                @include('admin.components/confirm/button', [
                                                    'url' => route(AdminRouterNames()::page_comments_approve, ['comment_id' => $comment->id]),
                                                    'title' => __('Одобрить комментарий'),
                                                    'icon' => '<i class="fas fa-thumbs-up"></i>',
                                                    'confirmText' => 'Вы действительно хотите одобрить этот комментарий?',
                                                    'method' => 'patch',
                                                ])
                                            @else
                                                @include('admin.components/confirm/button', [
                                                    'url' => route(AdminRouterNames()::page_comments_unapprove, ['comment_id' => $comment->id]),
                                                    'title' => __('Отклонить комментарий'),
                                                    'icon' => '<i class="fas fa-thumbs-down"></i>',
                                                    'confirmText' => 'Вы действительно хотите отклонить этот комментарий?',
                                                    'method' => 'patch',
                                                ])
                                            @endif
                                        </div>
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
    @include('admin.components/confirm/modal')
@endsection
