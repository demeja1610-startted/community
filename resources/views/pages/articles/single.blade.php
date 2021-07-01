@extends('layouts.app')

@section('content')
    <div class="article-single">
        @include('components.article.single', ['article' => $article])
    </div>
@endsection
