@extends('layouts.admin')

@section('content_header')
    <h1>{!! __('Консоль - категории') !!}</h1>
@stop

@section('layoutContent')
    <div class="row">
        @include('admin.components/categories/form', [
            'formWrapperClasses' => 'col-12 col-xl-6',
        ])
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        {!! __('Список категорий') !!}
                    </h3>
                </div>
                <div class="card-body p-0">
                    @include('admin.components/categories/list', ['categories' => $categories])
                </div>
                @if ($categories->hasPages())
                    @include('admin.components/categories/pagination', ['categories' => $categories])
                @endif
            </div>
        </div>
    </div>
    @include('admin.components/confirm/modal')
@endsection
