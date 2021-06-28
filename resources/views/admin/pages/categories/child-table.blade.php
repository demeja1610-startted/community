@php
    $dashes++;
@endphp
<ul class="list-group list-group-flush">
    @foreach ($childrenCategories as $childrenCategory)
        @include('admin.pages/categories/child-table-row', ['childrenCategory' => $childrenCategory])
    @endforeach
</ul>
