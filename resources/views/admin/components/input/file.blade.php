<div class="custom-file">
    <input
        type="file"
        class="custom-file-input {{ $inputClasses ?? '' }}"
        id="{{ $id }}"
        name="{{ $name }}"
        data-text="{!! $inputText !!}"
        @isset($url) data-url="{{ $url }}" @endisset
        @isset($csrf) data-csrf="{{ $csrf }}" @endisset
        @isset($multiple) multiple @endisset>
    <label class="custom-file-label {{ $labelClasses ?? '' }}" for="{{ $id }}">
        <span class="custom-file__names">{!! $inputText !!}</span>
        <span class="custom-file-label__text">{!! $labelText !!}</span>
    </label>
</div>
