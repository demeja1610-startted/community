<div class="card card-secondary mt-2 w-100">
    @isset($title)
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
    @endisset

    <form autocomplete="off" method="POST" action="{{ $action }}">
        @csrf

        @isset($method)
            @method($method)
        @endisset

        <div class="card-body">
            {{ $formContent }}
        </div>

        <div class="card-footer">
            <button type="submit" class="btn  {{ $submitClasses ?? 'btn-primary' }}">
                {{ $submitText }}
            </button>
        </div>
    </form>
</div>
