@if (session()->has('success') || session()->has('error'))
  <div class="notifications">
    @if (session()->has('success'))
      @include('components.notification/item', ['text' => session()->get('success'), 'class' => 'success'])
    @elseif(session()->has('error'))
      @include('components.notification/item', ['text' => session()->get('error'), 'class' => 'error'])
    @endif
  </div>
@endif
