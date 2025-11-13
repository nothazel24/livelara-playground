@props(['active' => false])

@php
    $classes = $active ?? false ? 'nav-link active' : 'nav-link';
@endphp

<li class="nav-item">
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <span data-lucide="arrow-up-right" width="13"></span>
    </a>
</li>
