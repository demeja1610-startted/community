<div class="form-group">
    <div class="custom-control custom-switch">
        <input
            type="checkbox"
            class="custom-control-input {{ $inputClasses ?? '' }}"
            @isset($id) id="{{ $id }}" @endisset
            name="{{ $name }}"
            @if (isset($checked) && $checked === true)
                checked="checked"
            @endif
        >
        <label
            class="custom-control-label {{ $labelClasses ?? '' }}"
            @isset($id) for="{{ $id }}" @endisset
        >
            {{ $label }}
        </label>
    </div>
</div>
