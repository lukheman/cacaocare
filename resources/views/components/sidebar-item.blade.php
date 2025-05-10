@props(['href' => '', 'active' => false])

@php
    $classes = $active ? 'sidebar-item active' : 'sidebar-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{ $href }}" class="sidebar-link">
        <i data-feather="home" width="20"></i>
        <span>{{ $slot }}</span>
    </a>
</li>
