@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="article-single">
            <h1 class="article-single__title">{!! $article->title !!}</h1>
            <img src="{!! $article->images->first()->url !!}" alt="{{ $article->images->first()->alt }}">
        </div>
        @include('components.comments/wrap', ['model' => $article, 'max_depth' => $max_depth, 'comments' => $comments])
    </div>
@endsection
