<div class="comment-mini">
    @include('components.question-information.wrap', ['avatar' => $user->avatar->url, 'name' => $user->name, 'date' => $created_at])
    <p class="text_medium comment-mini__content">{!! $comment !!}</p>
    <a href="{{ $link }}" class="text_medium comment-mini__question">{!! $question !!}</a>
</div>
