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
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        {{ __('Список категорий') }}
                    </h3>
                </div>
                <div class="card-body p-0">
                    {{-- @dd($categories) --}}
                    @include('admin.pages/categories/table', ['categories' => $categories])
                </div>
                @if ($categories->hasPages())
                    @include('admin.pages/categories/pagination', ['categories' => $categories])
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
