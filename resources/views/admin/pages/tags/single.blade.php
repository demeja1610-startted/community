@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @include('admin.components/tags/form', ['tag' => $tag])
    </div>
@endsection
