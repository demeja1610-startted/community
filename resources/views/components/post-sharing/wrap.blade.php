@php
    $items = [
        [
            'link' => '#',
            'icon' => 'socials.vk',
            'class' => ''
        ],
        [
            'link' => '#',
            'icon' => 'socials.fb',
            'class' => ''
        ],
        [
            'link' => '#',
            'icon' => 'socials.tw',
            'class' => ''
        ],
        [
            'link' => '#',
            'icon' => 'copy',
            'class' => ''
        ]
    ]
@endphp
<div class="post-sharing {{ isset($classes) ? $classes : '' }}">
    @foreach($items as $item)
        @include('components.post-sharing.item', ['link' => $item['link'], 'icon' => $item['icon'], 'classes' => $item['class']])
    @endforeach
</div>
