<div class="form-group">
    @isset($label)
        <label @isset($id) for="{{ $id }}" @endisset>
            {{ $label }}
        </label>
    @endisset
    {{-- Если форматировать textarea, то появятся лишние пробелы при рее рендере --}}
    <textarea class="textarea form-control {{ $classes ?? '' }}"
        @isset($id) id="{{ $id }}" @endisset name="{{ $name }}">@if(!empty($value)){!! $value !!}@endif</textarea>
    @isset($error)
        @error($error)
            <p class="text text-danger">{{ $message }}</p>
        @enderror
    @endisset
</div>
