@extends('layouts.app')

@section('SeoTitle', 'Community - Main page')

@section('content')
    <div class="articles">
        @if(!empty($articles))
            @foreach($articles as $article)
                @include('components.article.card', compact('article'))
            @endforeach
        @endif
    </div>
@endsection
