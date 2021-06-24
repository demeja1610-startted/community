@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @include('admin.pages/categories/form', ['category' => $category])
    </div>
@endsection
