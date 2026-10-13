@props(['title' => null, 'subtitle' => null, 'padding' => 'p-6'])

<div {{ $attributes->merge(['class' => 'card ' . $padding]) }}>
    @if ($title || isset($header))
        <div class="flex items-start justify-between gap-4 mb-5">
            <div class="min-w-0">
                @if ($title)
                    <h3 class="text-lg font-semibold text-slate-100">{{ $title }}</h3>
                @endif
                @if ($subtitle)
                    <p class="text-sm text-slate-400 mt-1">{{ $subtitle }}</p>
                @endif
            </div>
            @isset($header)
                <div class="flex-shrink-0">{{ $header }}</div>
            @endisset
        </div>
    @endif

    {{ $slot }}

    @isset($footer)
        <div class="mt-5 pt-5 border-t border-slate-800">{{ $footer }}</div>
    @endisset
</div>