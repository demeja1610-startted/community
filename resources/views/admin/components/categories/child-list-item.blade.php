<li class="list-group-item d-flex justify-content-start align-items-center categories-child-list__item">
    <a href="{{ route('page.admin.categories.edit', ['category_id' => $childrenCategory->id]) }}" class="link w-100">
        @for ($i = 0; $i < $dashes; $i++)
            &#8209;
        @endfor
        {{ $childrenCategory->title }}
    </a>
    <span class="badge badge-primary badge-pill mr-3">{{ $childrenCategory->article_count + $childrenCategory->question_count }}</span>
    <div>
        <button
            class="btn btn-outline-primary btn-sm"
            data-toggle="modal"
            data-target="#deleteConfirmModal"
            title="{{ __('Удалить') }}"
            data-href="{{ route('admin.categories.delete', ['category_id' => $childrenCategory->id]) }}"
        >
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</li>
@if (isset($childrenCategory->childs) && !$childrenCategory->childs->isEmpty())
    @include('admin.components/categories/child-list', ['childrenCategories' => $childrenCategory->childs])
@endif
