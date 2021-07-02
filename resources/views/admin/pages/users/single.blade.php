@extends('layouts.admin')

@section('layoutContent')
    <div class="row">
        @include('admin.components/users/form', [
            'formClasses' => 'mt-2'
        ])
    </div>
@endsection
