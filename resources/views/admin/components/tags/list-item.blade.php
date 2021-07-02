@php
    $dashes = 0
@endphp

<li class="list-group-item d-flex justify-content-start align-items-center tags-list__item">
    <a href="{{ route(AdminRouterNames()::tags_update, ['tag_id' => $tag->id]) }}" class="link w-100  text-break mr-2">{!! $tag->title !!}</a>
    <span class="badge badge-primary badge-pill mr-3">{!! $tag->article_count + $tag->question_count !!}</span>
    <div class="d-flex align-items-center">
        <a href="{{ route(AdminRouterNames()::page_tags_edit, $tag) }}" class="btn btn-outline-primary btn-sm mr-2" title="{!! __('Редактировать') !!}">
            <i class="fas fa-edit"></i>
        </a>
        @include('admin.components/confirm/button', [
            'url' => route(AdminRouterNames()::tags_destroy, ['tag_id' => $tag->id]),
            'title' => __('Удалить тег'),
            'icon' => '<i class="fas fa-trash-alt"></i>',
            'confirmText' => 'Вы действительно хотите удалить этот тег?',
            'method' => 'delete',
            'buttonClasses' => 'btn-outline-danger',
        ])
    </div>
</li>
