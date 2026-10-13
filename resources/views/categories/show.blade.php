@extends('layouts.app')

@section('title', $category->name)

@section('content')
    @php
        $catIcons = [
            'Elektronik' => '📱', 'Pakaian' => '👕', 'Makanan' => '🍚',
            'Minuman' => '🥤', 'Perabotan' => '🪑', 'Olahraga' => '⚽',
            'Kecantikan' => '💄', 'Mainan' => '🧸', 'Buku' => '📚', 'Otomotif' => '🏍️',
        ];
        $icon = $catIcons[$category->name] ?? '📦';

        $catColors = [
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
        $gradient = $catColors[$category->name] ?? 'from-slate-500 to-slate-700';
    @endphp

    <div class="mb-8">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('categories.index') }}" class="hover:text-slate-300">Kategori</a>
            <span>/</span>
            <span class="text-slate-300">{{ $category->name }}</span>
        </nav>

        <div class="flex items-center gap-5">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br {{ $gradient }} flex items-center justify-center text-4xl shadow-lg">
                {{ $icon }}
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-1">{{ $category->name }}</h1>
                <p class="text-slate-400 text-sm">{{ $category->description ?: 'Tidak ada deskripsi' }}</p>
            </div>
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-4">Produk dalam Kategori Ini ({{ $category->products->count() }})</h2>

    @if($category->products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($category->products as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all">
                    <h3 class="font-semibold text-slate-100 mb-2 line-clamp-2">{{ $product->name }}</h3>
                    <p class="text-lg font-bold text-red-400">{{ $product->formatted_price }}</p>
                </a>
            @endforeach
        </div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-4xl mb-3 opacity-40">📦</p>
            <p class="text-slate-400">Belum ada produk dalam kategori ini.</p>
        </div>
    @endif
@endsection