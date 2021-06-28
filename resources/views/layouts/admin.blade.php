@extends('adminlte::page')

@section('content')
    @include('admin.components/notifications/wrap')

    @yield('layoutContent')
@endsection

@section('css')
    <link href="{{ mix('admin/css/main.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ mix('admin/js/main.js') }}"></script>
@stop
