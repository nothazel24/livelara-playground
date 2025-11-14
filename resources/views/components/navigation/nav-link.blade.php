@props(['active' => false])

{{-- statement if else (ternary) --}}
@php
    $classes = $active ?? false ? 'nav-link active' : 'nav-link';
@endphp

<li class="nav-item">

    {{-- menggabungkan statement dinamis kedalam tag class navbar --}}
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <span data-lucide="arrow-up-right" width="13"></span>
    </a>
</li>
