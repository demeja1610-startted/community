<button
    class="btn btn-outline-primary btn-sm {{ $buttonClasses ?? '' }}"
    data-toggle="modal"
    data-target="#deleteConfirmModal"
    @isset($title)
        title="{{ $title }}"
    @endisset
    data-href="{{ $url }}"
>
    <i class="fas fa-trash-alt"></i>
</button>
