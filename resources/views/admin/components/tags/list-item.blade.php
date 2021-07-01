@php
    $dashes = 0
@endphp

<li class="list-group-item d-flex justify-content-start align-items-center tags-list__item">
    <a href="{{ route(AdminRouterNames()::page_tags_update, ['tag_id' => $tag->id]) }}" class="link w-100">{{ $tag->title }}</a>
    <span class="badge badge-primary badge-pill mr-3">{{ $tag->article_count + $tag->question_count }}</span>
    <div>
        @include('admin.components/confirm/button', [
            'url' => route(AdminRouterNames()::page_tags_destroy, ['tag_id' => $tag->id]),
            'title' => __('Удалить тег'),
            'icon' => '<i class="fas fa-trash-alt"></i>',
            'confirmText' => 'Вы действительно хотите удалить этот тег?',
            'method' => 'delete',
        ])
    </div>
</li>
