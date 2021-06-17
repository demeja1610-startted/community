@extends('layouts.app')

@section('content')
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="row">
            <input type="text" name="email">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="row">
            <input type="password" name="password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="row">
            <input type="password" name="password_confirmation">
            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button class="submit">Зарегистрироваться</button>
    </form>
@endsection
