@props([
    'action' => '#',
    'method' => 'get',
])

<form action="{{ $action }}" method="{{ strtolower($method) === 'get' ? 'get' : 'post' }}" {{ $attributes }}>
    @csrf
    @unless(in_array(strtolower($method), ['get', 'post']))
        @method($method)
    @endunless
    {{ $slot }}
</form>
