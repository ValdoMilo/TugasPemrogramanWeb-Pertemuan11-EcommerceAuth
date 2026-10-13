@extends('layouts.app')

@section('title', $product->name)

@section('content')
    @php
        $colors = [
            'Elektronik' => 'from-blue-500 to-cyan-500',
            'Pakaian'    => 'from-pink-500 to-rose-500',
            'Makanan'    => 'from-orange-500 to-amber-500',
            'Minuman'    => 'from-emerald-500 to-teal-500',
            'Perabotan'  => 'from-amber-600 to-yellow-600',
            'Olahraga'   => 'from-red-500 to-orange-500',
            'Kecantikan' => 'from-fuchsia-500 to-pink-500',
            'Mainan'     => 'from-purple-500 to-indigo-500',
            'Buku'       => 'from-slate-500 to-slate-700',
            'Otomotif'   => 'from-zinc-500 to-slate-700',
        ];
        $icons = [
            'Elektronik' => '📱', 'Pakaian' => '👕', 'Makanan' => '🍚',
            'Minuman' => '🥤', 'Perabotan' => '🪑', 'Olahraga' => '⚽',
            'Kecantikan' => '💄', 'Mainan' => '🧸', 'Buku' => '📚', 'Otomotif' => '🏍️',
        ];
        $catName = $product->category->name ?? 'Elektronik';
        $gradient = $colors[$catName] ?? 'from-slate-500 to-slate-700';
        $icon = $icons[$catName] ?? '📦';
    @endphp

    <div class="max-w-4xl mx-auto">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('products.index') }}" class="hover:text-slate-300">Produk</a>
            <span>/</span>
            <span class="text-slate-300">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="aspect-square rounded-2xl bg-slate-800 overflow-hidden border border-slate-800 relative">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="hidden absolute inset-0 bg-gradient-to-br {{ $gradient }} items-center justify-center">
                        <span class="text-9xl">{{ $icon }}</span>
                    </div>
                @else
                    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} flex items-center justify-center">
                        <span class="text-9xl">{{ $icon }}</span>
                    </div>
                @endif
            </div>

            <div>
                <span class="inline-flex px-3 py-1 rounded-md bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-medium mb-4">
                    {{ $catName }}
                </span>

                <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
                <p class="text-3xl font-bold text-red-400 mb-6">{{ $product->formatted_price }}</p>

                <div class="space-y-3 mb-6">
                    <div class="flex justify-between py-2 border-b border-slate-800">
                        <span class="text-slate-400 text-sm">Stok</span>
                        <span class="font-semibold {{ $product->stock > 0 ? 'text-emerald-400' : 'text-red-400' }}">
                            {{ $product->stock }} unit
                        </span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-800">
                        <span class="text-slate-400 text-sm">Supplier</span>
                        <span class="font-semibold text-slate-100">{{ $product->supplier->name ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-800">
                        <span class="text-slate-400 text-sm">Status</span>
                        <span class="font-semibold {{ $product->is_active ? 'text-emerald-400' : 'text-slate-400' }}">
                            {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>

                @if($product->description)
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-slate-300 mb-2">Deskripsi</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="flex gap-3">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm font-medium hover:bg-slate-700">
                        ← Kembali
                    </a>
                    @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                        <a href="{{ route('products.edit', $product) }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                            Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection