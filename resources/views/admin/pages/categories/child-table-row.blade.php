<li class="list-group-item d-flex justify-content-start align-items-center">
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
    @include('admin.pages/categories/child-table', ['childrenCategories' => $childrenCategory->childs])
@endif
