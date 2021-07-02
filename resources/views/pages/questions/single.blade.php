@extends('layouts.app')

@section('content')
    <div class="question-single">
        @include('components.article.elements.info', [
            'avatar' => $question->user->avatar ? $question->user->avatar->url : URL::asset('/images/no-avatar.svg'),
            'name' => $question->user->name,
            'alt' => $question->user->avatar ? $question->user->avatar->alt : 'avatar',
            'date' => $question->created_at,
            'viewsCount' => $question->views
    ])
        @include('components.post-sharing.wrap', ['classes' => 'mrgn16-bottom'])
        <h1 class="title_single mrgn16-bottom">{!! $question->title !!}</h1>
        @include('components.post-actions.wrap', ['answersCount' => $question->comments_count])
        <p class="text_big post__description">{!! $question->description !!}</p>
        @include('components.post-attributes.wrap', ['categories' => $question->categories, 'tags' => $question->tags])
    </div>
@endsection
