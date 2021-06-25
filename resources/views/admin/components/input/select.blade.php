@php
    $isPlaceholder = isset($placeholder) ? true : false;
@endphp
<div class="form-group">
    @isset($label)
        <label
            @isset($id)
                for="{{ $id }}"
            @endisset
        >
            {{ $label }}
        </label>
    @endisset
        <select
            class="form-control select2 {{ $isPlaceholder ? 'isPlaceholder' : '' }} {{ $selectClasses ?? '' }}" name="{{ $name }}"
            @if ($isPlaceholder)
                data-placeholder = "{{ $placeholder }}"
            @endif
            style="width: 100%;"
        >
            @if ($isPlaceholder)
                <option></option>
            @endif
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}" @isset($option['selected']) selected @endisset>
                    {{ $option['name'] }}
                </option>
            @endforeach
        </select>
    @isset($error)
        @error($error)
            <p class="text text-danger">{{ $message }}</p>
        @enderror
    @endisset
</div>
