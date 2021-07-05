<div class="comment-block">
    <div class="comment-block__top">
        @include('components.author.wrap', ['user' => $comment->user, 'date' => $comment->created_at])
        <div class="comment-block__actions">
            <div class="comment-block__likes">
                <button class="button comment-block__likes-button comment-block__dislike">
                    @include('icons.control-down')
                </button>
                <span class="comment-block__likes-count">{!! isset($likesCount) ? $likesCount : '0' !!}</span>
                <button class="button comment-block__likes-button comment-block__like">
                    @include('icons.control-up')
                </button>
            </div>
            <button class="button comment-block__reply">Ответить</button>
        </div>
    </div>
</div>
