<button
    class="btn btn-outline-primary btn-sm {{ $buttonClasses ?? '' }}"
    data-toggle="modal"
    data-target="#confirmModal"
    title="{!! $title !!}"
    data-href="{{ $url }}"
    data-method="{{ $method ?? 'post' }}"
    data-text="{!! $confirmText !!}"
>
    {!!  $icon ?? '' !!}
    {!! $text ?? '' !!}
</button>
