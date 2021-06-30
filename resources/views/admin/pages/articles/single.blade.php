@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @include('admin.components/articles/form', [
            'formClasses' => 'mt-2'
        ])
    </div>
@endsection
