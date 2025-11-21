@props(['active' => false])

{{-- statement if else (ternary) --}}
@php
    $classes =
        $active ?? false
            ? 'text-slate-900 font-semibold border-slate-800'
            : 'text-slate-900 border-slate-800';
@endphp

<li class="px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">

    {{-- menggabungkan statement dinamis kedalam tag class navbar --}}
    <a wire:navigate {{ $attributes->merge(['class' => $classes . ' flex items-center gap 2']) }}>
        {{ $slot }}
        <span data-lucide="arrow-up-right" width="13"></span>
    </a>
</li>
