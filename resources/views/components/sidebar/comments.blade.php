<div class="sidebar__item sidebar-comments">
    <h4 class="text_big sidebar__title">Лучшие комментарии</h4>
    <ul class="sidebar-comments__list">
        @foreach($popularComments as $comment)
            @if($comment->user->avatar)
                @dump($comment)
                {{--<li>
                    @include('components.comment.mini', ['user' => $comment->user,'comment' => $comment->body, 'link' => '#', 'question' => 'Не работает atahualpa options в этой теме', 'created_at' => $comment->created_at])
                </li>--}}
            @endif
        @endforeach
    </ul>
</div>
