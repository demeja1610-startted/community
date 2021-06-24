<div class="comments">
    @include('components.comments/list', ['comments' => $comments, 'max_depth' => $max_depth, 'paginate' => true])
    @include('components.comments/form', ['model' => $model])
</div>
