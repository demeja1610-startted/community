@if($bookmarks->count())
    @dump($bookmarks)
@else
    @include('lk.components.bookmarks.empty')
@endif

