@extends('layouts.app')

@section('content')
    <div class="questions">
        @include('components.article-filter.wrap', ['question' => true])
        @forelse ($questions as $question)
            @include('components.question-card.wrap', ['question' => $question])
        @empty
            <p class="articles__empty">{!! __('Нет вопросов') !!}</p>
        @endforelse
        {!! $questions->links('pagination::bootstrap-4') !!}
    </div>
@endsection
