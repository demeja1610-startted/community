<div class="post-attributes">
    @foreach($categories as $category)
        @include('components.post-attributes.item', ['class' => 'post-attributes__category', 'name' => $category->title])
    @endforeach
    @foreach($tags as $tag)
        @include('components.post-attributes.item', ['class' => 'post-attributes__tag', 'name' => $tag->title])
    @endforeach
</div>
