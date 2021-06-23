<div class="comments-list">
    <div class="comments-list__wrapper">
        @foreach ($comments as $comment)

            <div class="comments-list__item" data-id="{{ $comment->id }}">
                <strong>
                    {{ $comment->user->name }}
                    @if ($comment->replyTo)
                        {!! __('Ответил(-а)') !!}
                        {!! $comment->replyTo->name !!}
                    @endif
                </strong>
                <p>{{ $comment->body }}</p>

                <a href="" id="reply">{!! __('Ответить') !!}</a>

                @if ($comment->depth < $max_depth)
                    @php
                        $replies = $comment->replies;
                    @endphp

                    @if (!$replies->isEmpty()) @include('components.comments/list', ['comments' => $replies, 'paginate' => false]) @endif
                @endif
            </div>

        @endforeach
    </div>

    @if (isset($paginate) && $paginate !== false)
        <div class="pagination">
            {!! $comments->links('pagination::default') !!}
        </div>
    @endif
</div>
