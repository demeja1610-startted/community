<td
    class="text-center {{ $cellClasses ?? '' }} loop-table__cell"
    @isset($attributes)
        @foreach($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    @endisset
>
    {!! $cellContent !!}
</td>
