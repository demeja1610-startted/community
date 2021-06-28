@extends('layouts.admin')

@section('content_header')
    <h1>{{ __('Консоль - теги') }}</h1>
@stop

@section('layoutContent')
    <div class="row">
        <div class="col-12 col-xl-6">
            @include('admin.components/tags/form')
        </div>
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        {{ __('Список тегов') }}
                    </h3>
                </div>
                <div class="card-body p-0">
                    @include('admin.components/tags/list', ['tags' => $tags])
                </div>
                @if ($tags->hasPages())
                    @include('admin.components/tags/pagination', ['tags' => $tags])
                @endif
            </div>
        </div>
    </div>
    @component('admin.components/delete-confirm-modal/wrap')
        @slot('title', __('Удаление тега'))
        @slot('content')
            <p class="text">{!! __('Вы действительно хотите удалить этот тег?') !!}</p>
        @endslot
    @endcomponent
@endsection
