<a
    href="{{ $url }}"
    class="btn btn-outline-primary btn-sm {{ $buttonClasses ?? '' }}"
    @isset($title)
    title="{{ $title }}"
    @endisset
>
    <i class="fas fa-edit"></i>
</a>
