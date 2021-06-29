@php
    $dashes = 0
@endphp

<li class="list-group-item d-flex justify-content-start align-items-center tags-list__item">
    <a href="{{ route('page.admin.tags.edit', ['tag_id' => $tag->id]) }}" class="link w-100">{{ $tag->title }}</a>
    <span class="badge badge-primary badge-pill mr-3">{{ $tag->article_count + $tag->question_count }}</span>
    <div>
        <button
            class="btn btn-outline-primary btn-sm"
            data-toggle="modal"
            data-target="#deleteConfirmModal"
            title="{{ __('Удалить') }}"
            data-href="{{ route('admin.tags.delete', ['tag_id' => $tag->id]) }}"
        >
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</li>
