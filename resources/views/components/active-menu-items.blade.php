@props(['active'=> false])

@php
$class = ($active)
            ? 'menu-item active'
            : 'menu-item';
@endphp

<li {{ $attributes->merge(['class' => $class]) }}>

