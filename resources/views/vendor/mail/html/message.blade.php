@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<div style="background-color: white; display: flex; width: 100%;">

<img src="{{ asset('assetfront/img/logo.png') }}" style="max-width: 60% !important; margin-left: 20% !important;"  alt="{{ config('app.name')}}">
<div style="margin-top: 20px">
</div>
</div>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('Tous droits réservés.')
@endcomponent
@endslot
@endcomponent
