@extends('layouts.admin')

@section('layoutContent')
    <div class="row mt-2">
        @component('admin.components/gallery/wrap')
            @slot('images', $images)
        @endcomponent
    </div>
@endsection
