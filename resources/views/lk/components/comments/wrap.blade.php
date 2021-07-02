@if($comments->count())
    @dump($comments)
@else
@include('lk.components.comments.empty')
@endif

