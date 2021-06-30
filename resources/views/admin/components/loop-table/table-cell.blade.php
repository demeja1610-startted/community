<td
    class="text-center {{ $cellClasses ?? '' }}"
    @isset($attributes)
        @foreach($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    @endisset
>
    {{ $cellContent }}
</td>
