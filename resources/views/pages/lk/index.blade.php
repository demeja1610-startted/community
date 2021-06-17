@extends('layouts.app')

@section('content')
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit">Выйти</button>
    </form>
@endsection
