@if($articles->count())
    @dump($articles)
@else
    @include('lk.components.articles.empty')
@endif

