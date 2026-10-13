@props(['variant' => 'default'])

@php
    $styles = [
        'default'   => 'bg-slate-800 text-slate-300 border-slate-700',
        'red'       => 'bg-red-950/50 text-red-400 border-red-900',
        'green'     => 'bg-emerald-950/50 text-emerald-400 border-emerald-900',
        'yellow'    => 'bg-amber-950/50 text-amber-400 border-amber-900',
        'blue'      => 'bg-blue-950/50 text-blue-400 border-blue-900',
    ][$variant] ?? 'bg-slate-800 text-slate-300 border-slate-700';
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium border {$styles}"]) }}>
    {{ $slot }}
</span>