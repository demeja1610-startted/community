<div class="comment-mini">
    @include('components.question-information.wrap', ['avatar' => 'https://timeweb.com/ru/community/avatar/66/6604e9e1c3d320ab3bcdfea110642d3a_thumb.jpg', 'name' => 'Вася Пупкин', 'date' => 'Вчера в 10 утра'])
    <p class="text_medium comment-mini__content">{!! $comment !!}</p>
    <a href="{{ $link }}" class="text_medium comment-mini__question">{!! $question !!}</a>
</div>
