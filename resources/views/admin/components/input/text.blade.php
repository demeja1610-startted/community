<div class="form-group {{ $wrapperClasses ?? '' }}">
    @isset($label)
        <label
            @isset($id)
                for="{{ $id }}"
            @endisset
        >
            {!! $label !!}
        </label>
    @endisset
    <input
        autocomplete="{{ $autocomplete ?? 'doNotUseFreakingAutocomplete' }}"
        type="text"
        class="form-control {{ $inputClasses ?? '' }}"
        @isset($id)
            id="{{ $id }}"
        @endisset
        @isset($placeholder)
            placeholder="{!! $placeholder !!}"
        @endisset
        @if(!empty($value))
            value="{!! $value !!}"
        @endif
        name="{{ $name }}"
    >
    @isset($error)
        @error($error)
            <p class="text text-danger">{!! $message !!}</p>
        @enderror
    @endisset
</div>
