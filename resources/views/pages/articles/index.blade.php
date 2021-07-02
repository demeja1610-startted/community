@extends('layouts.app')

@section('content')
    <div class="articles">
        @include('components.article-filter.wrap', ['question' => false])
        @forelse ($articles as $article)
            @include('components.article/card')
        @empty
            <p class="articles__empty">{!! __('Нет статей') !!}</p>
        @endforelse
        {!! $articles->links('pagination::bootstrap-4') !!}
    </div>
@endsection
