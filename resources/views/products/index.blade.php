@extends('layouts.app')

@section('title', 'Produk')

@section('content')

    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-tight mb-2">Katalog Produk</h1>
            <p class="text-slate-400">Total {{ $products->total() }} produk terdaftar.</p>
        </div>
        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
            <a href="{{ route('products.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500 transition-colors">
                + Tambah Produk
            </a>
        @endif
    </div>

    <form method="GET" class="mb-6 flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari produk..."
               class="flex-1 px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500">
        <select name="category"
                class="sm:w-48 px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
        <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm font-medium hover:bg-slate-700 transition-colors">
            Cari
        </button>
    </form>

    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($products as $product)
                @php
                    // Warna gradient per kategori
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
                    $catName = $product->category->name ?? 'Elektronik';
                    $gradient = $colors[$catName] ?? 'from-slate-500 to-slate-700';

                    // Emoji per kategori
                    $icons = [
                        'Elektronik' => '📱',
                        'Pakaian'    => '👕',
                        'Makanan'    => '🍚',
                        'Minuman'    => '🥤',
                        'Perabotan'  => '🪑',
                        'Olahraga'   => '⚽',
                        'Kecantikan' => '💄',
                        'Mainan'     => '🧸',
                        'Buku'       => '📚',
                        'Otomotif'   => '🏍️',
                    ];
                    $icon = $icons[$catName] ?? '📦';
                @endphp

                <article class="rounded-2xl bg-slate-900/50 border border-slate-800 overflow-hidden hover:border-slate-700 hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    {{-- Gambar Produk --}}
                    <div class="aspect-[4/3] bg-slate-800 relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ $product->image }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 loading="lazy"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="hidden absolute inset-0 bg-gradient-to-br {{ $gradient }} items-center justify-center">
                                <span class="text-7xl">{{ $icon }}</span>
                            </div>
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} flex items-center justify-center">
                                <span class="text-7xl">{{ $icon }}</span>
                            </div>
                        @endif

                        {{-- Badge Stok --}}
                        <div class="absolute top-3 right-3 z-10">
                            @if($product->stock > 10)
                                <span class="px-2.5 py-1 rounded-md bg-emerald-500/90 backdrop-blur text-white text-xs font-semibold shadow">
                                    Stok {{ $product->stock }}
                                </span>
                            @elseif($product->stock > 0)
                                <span class="px-2.5 py-1 rounded-md bg-yellow-500/90 backdrop-blur text-white text-xs font-semibold shadow">
                                    Stok {{ $product->stock }}
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-md bg-red-500/90 backdrop-blur text-white text-xs font-semibold shadow">
                                    Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="mb-3">
                            <span class="inline-flex px-2.5 py-1 rounded-md bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-medium">
                                {{ $catName }}
                            </span>
                        </div>

                        <h3 class="font-semibold text-slate-100 mb-1 line-clamp-2 min-h-[2.5rem]">{{ $product->name }}</h3>
                        <p class="text-xs text-slate-500 mb-3 flex items-center gap-1">
                            <span>🏭</span> {{ $product->supplier->name ?? '-' }}
                        </p>

                        <p class="text-xl font-bold text-red-400 mb-4">{{ $product->formatted_price }}</p>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-800 mt-auto">
                            <a href="{{ route('products.show', $product) }}"
                               class="text-xs text-red-400 hover:text-red-300 font-medium">Detail →</a>
                            @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                                <div class="flex gap-2">
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="text-xs text-slate-400 hover:text-slate-100">Edit</a>
                                    <form method="POST" action="{{ route('products.destroy', $product) }}"
                                          onsubmit="return confirm('Hapus produk ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-red-500 hover:text-red-400">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-8">{{ $products->links() }}</div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-5xl mb-4 opacity-40">📭</p>
            <h3 class="text-lg font-semibold mb-2">Belum ada produk</h3>
            @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                <a href="{{ route('products.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                    + Tambah Produk
                </a>
            @endif
        </div>
    @endif

@endsection