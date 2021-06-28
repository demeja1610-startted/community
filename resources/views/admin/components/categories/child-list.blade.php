@php
    $dashes++;
@endphp
<ul class="list-group list-group-flush categories-child-list">
    @foreach ($childrenCategories as $childrenCategory)
        @include('admin.components/categories/child-list-item', ['childrenCategory' => $childrenCategory])
    @endforeach
</ul>
