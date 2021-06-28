@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @include('admin.components/categories/form', [
            'category' => $category,
            'formClasses' => 'mt-2',
        ])
    </div>
@endsection
