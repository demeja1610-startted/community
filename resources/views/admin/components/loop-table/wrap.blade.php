<div class="card w-100 my-2 {{ $cartClasses ?? '' }}">
    <div class="card-body p-0 {{ $cartBodyClasses ?? '' }}">
        <table class="table table-hover table-bordered table-responsive-xl {{ $tableClasses ?? '' }} loop-table">
            @if (isset($headerContent))
                <thead class="{{ $tableHeaderClasses ?? '' }}">
                    {!! $headerContent !!}
                </thead>
            @endif

            <tbody class="{{ $tableBodyClasses ?? '' }}">
                {!! $tableContent !!}
            </tbody>
        </table>
    </div>

    @isset($footerContent)
        @component('admin.components/loop-table/footer')
            @slot('footerContent')
                {!! $footerContent !!}
            @endslot

            @isset($footerClasses))
                @slot('footerClasses', $footerClasses)
            @endisset
        @endcomponent
    @endisset
</div>
