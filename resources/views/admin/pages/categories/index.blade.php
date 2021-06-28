@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - категории') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
       <div class="col-12 col-xl-6">
            @include('admin.pages/categories/form')
       </div>
       <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('Название') }}</th>
                                <th class="text-center">{{ __('Слаг') }}</th>
                                <th class="text-center">{{ __('Действия') }}</th>
                                <th class="text-center">{{ __('Кол-во статей') }}</th>
                                <th class="text-center">{{ __('Кол-во вопросов') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('page.admin.categories.edit', ['category_id' => $category->id]) }}" class="link text-truncate">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $category->slug }}</td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('page.admin.categories.edit', ['category_id' => $category->id]) }}"
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
                                            data-href="{{ route('admin.categories.delete', ['category_id' => $category->id]) }}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">{{ $category->articles_count }}</td>
                                    <td class="text-center">{{ $category->questions_count }}</td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($categories->hasPages())
                    <div class="card-footer px-3 pt-3 pb-0">
                        <div class="card-tools d-flex align-center justify-content-end">
                            {!! $categories->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                @endif
            </div>
       </div>
    </div>
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление категории'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить эту категорию?') !!}</p>
        @endslot
    @endcomponent
@endsection
