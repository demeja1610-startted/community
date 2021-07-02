@if($questions->count())
    @dump($questions)
@else
    @include('lk.components.questions.empty')
@endif

