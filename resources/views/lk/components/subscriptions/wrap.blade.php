@if($subscriptions->total())
    @foreach($subscriptions as $subscription)
        @include('lk.components.subscribe-item')
    @endforeach
@else
    @include('lk.components.subscriptions.empty')
@endif

