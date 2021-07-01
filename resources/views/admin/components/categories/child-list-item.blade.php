<li class="list-group-item d-flex justify-content-start align-items-center categories-child-list__item">
    <a href="{{ route(AdminRouterNames()::page_categories_edit, ['category_id' => $childrenCategory->id]) }}" class="link w-100">
        @for ($i = 0; $i < $dashes; $i++)
            &#8209;
        @endfor
        {{ $childrenCategory->title }}
    </a>
    <span class="badge badge-primary badge-pill mr-3">{{ $childrenCategory->article_count + $childrenCategory->question_count }}</span>
    <div>
        @include('admin.components/confirm/button', [
            'url' => route(AdminRouterNames()::page_categories_destroy, ['category_id' => $childrenCategory->id]),
            'title' => __('Удалить категорию'),
            'icon' => '<i class="fas fa-trash-alt"></i>',
            'confirmText' => 'Вы действительно хотите удалить эту категорию?',
            'method' => 'delete',
        ])
    </div>
</li>
@if (isset($childrenCategory->childs) && !$childrenCategory->childs->isEmpty())
    @include('admin.components/categories/child-list', ['childrenCategories' => $childrenCategory->childs])
@endif
