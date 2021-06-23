@extends('layouts.app')

@section('content')
    <div class="articles">
        @forelse ($articles as $article)
            @include('components.article/card')
        @empty
            <p class="articles__empty">{!! __('Нет статей') !!}</p>
        @endforelse
    </div>
@endsection
