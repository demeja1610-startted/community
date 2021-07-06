@extends('layouts.admin')

@section('layoutContent')
    <div class="row mt-2">
        @include('admin.components/gallery/header')

        @component('admin.components/gallery/wrap')
            @slot('images', $images)
        @endcomponent

        @include('admin.components/gallery/overlay')
    </div>
@endsection
