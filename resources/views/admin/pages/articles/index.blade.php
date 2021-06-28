@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - статьи') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12">
            <div class="card w-100 my-2">
                <div class="card-body p-0">
                    <table class="table table-responsive-xl">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">{{ __('ID') }}</th>
                                <th class="text-center">{{ __('Название') }}</th>
                                <th class="text-center">{{ __('Автор') }}</th>
                                {{-- <th class="text-center">{{ __('Кол-во просмотров') }}</th> --}}
                                <th class="text-center">{{ __('Дата создания') }}</th>
                                {{-- <th class="text-center">{{ __('Дата редактирования') }}</th> --}}
                                <th class="text-center">{{ __('Опубликовано') }}</th>
                                <th class="text-center">{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td class="text-center">{{ $article->id }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('page.admin.articles.edit', ['article_id' => $article->id]) }}" class="link text-truncate">
                                            {{ $article->title }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $article->user->name }}</td>
                                    {{-- <td class="text-center"><span class="badge bg-primary">{{ $article->views }}</span></td> --}}
                                    <td class="text-center">{{ $article->created_at }}</td>
                                    <td class="text-center">{{ $article->is_published ? __('Да') : __('Нет') }}</td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('page.admin.articles.edit', ['article_id' => $article->id]) }}"
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
                                            data-href="{{ route('admin.articles.delete', ['article_id' => $article->id]) }}"
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
                @if($articles->hasPages())
                    <div class="card-footer px-3 pt-3 pb-0">
                        <div class="card-tools d-flex align-center justify-content-end">
                            {!! $articles->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление статьи'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить эту статью?') !!}</p>
        @endslot
    @endcomponent
@endsection
