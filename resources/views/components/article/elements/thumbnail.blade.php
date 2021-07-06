@php
    $isEmpty = $article->images->isEmpty();
    $image = !$isEmpty ? $article->images->first()->url : '#';
    $alt = !$isEmpty ? $article->images->first()->alt : __('No image');
@endphp
<div class="article-thumbnail mrgn24-bottom">
    <img src="{!! $image  !!}" alt="{{ $alt  }}" class="article-thumbnail__image">
</div>
