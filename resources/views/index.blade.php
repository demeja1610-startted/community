@extends('layouts.app')

@section('SeoTitle', 'Community - Main page')

@section('content')
    @php
        $values = [
    'value1' => [
        'key1' => 1,
        'key2' => 2]
        , 'value2', 'value3', 'value4'];
    @endphp
    <div id="app">
        <example :values="{{ json_encode($values) }}"></example>
        <example2></example2>
    </div>

    <div class="container">
        <div class="page-wrapper">

            <main class="page-wrapper__content">
                @if(!empty($articles))
                    @foreach($articles as $article)
                        @include('components.article.card', compact('article'))
                    @endforeach
                @endif
            </main>

            <aside class="page-wrapper__sidebar">
                @include('components.sidebar.wrap')
            </aside>

        </div>
    </div>

@endsection
