@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-wrapper">

            <main class="page-wrapper__content">
                @include('components.article.single', ['article' => $article])
            </main>

            <aside class="page-wrapper__sidebar">
                @include('components.sidebar.wrap')
            </aside>

        </div>
    </div>
@endsection
