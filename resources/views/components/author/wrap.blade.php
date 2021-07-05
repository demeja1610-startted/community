<div class="author">
    <img src="{{ $user->avatar ? $user->avatar->url : URL::asset('/images/no-avatar.svg') }}" alt="avatar" class="author__avatar">
    <div class="author__right">
        <div class="text_small author__name">
            {!! $user->name !!}
            <span class="text_medium author__rating">+{!! isset($rating) ? $rating : '0' !!}</span>
        </div>
        <time class="text_small author__date">{!! date_format($date, 'j F \в H:i') !!}</time>
    </div>
</div>
