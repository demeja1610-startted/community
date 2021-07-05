<div class="sidebar__item sidebar-comments">
    <h4 class="text_big sidebar__title">Лучшие комментарии</h4>
    <ul class="sidebar-comments__list">
        @foreach($popularComments as $comment)
            @if($comment->user->avatar)
                <li>
                    @include('components.comment.mini', [
                        'user' => $comment->user,'comment' => $comment->body,
                        'link' => route($comment->commentableRouteName, $comment->commentable),
                        'question' => $comment->commentable->title,
                        'created_at' => $comment->created_at
                    ])
                </li>
            @endif
        @endforeach
    </ul>
</div>
