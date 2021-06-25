<a href="{{ App::make('url')->to('/') }}" class="{{ isset($iClasses) ? $iClasses : '' }}">
    @include('icons.logo', ['iClasses' => isset($iClasses) ? $iClasses . '-icon' : ''])
</a>
